<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use JsonException;
use M3O\Model\AbstractModel;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractService
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    abstract public function getServiceName(): string;

    /**
     * @param string $serviceMethod
     * @param array<string, mixed> $requestBody
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function request(string $serviceMethod, array $requestBody): ResponseInterface
    {
        return $this->getClient()->request(
            'POST',
            sprintf('%s/%s', $this->getServiceName(), $serviceMethod),
            [
                RequestOptions::JSON => $requestBody
            ]
        );
    }

    /**
     * @param ResponseInterface $response
     * @return array<string, mixed>|null
     */
    protected function parseResponseAsArray(ResponseInterface $response): ?array
    {
        try {
            return json_decode(
                $response->getBody()->getContents(),
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $je) {
            return null;
        }
    }

    /**
     * @template T
     * @param ResponseInterface $response
     * @param class-string<T> $model
     * @return T|null
     */
    protected function parseResponseAsModel(ResponseInterface $response, string $model)
    {
        if (!is_subclass_of($model, AbstractModel::class)) {
            throw new InvalidArgumentException('Invalid class string. Class must be instance of ModelInterface');
        }
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $responseJson = $this->parseResponseAsArray($response);
        if ($responseJson === null) {
            return null;
        }
        return $model::fromArray($responseJson);
    }

    /**
     * @template T
     * @param ResponseInterface $response
     * @param class-string<T> $model
     * @return T[]
     */
    protected function parseResponseAsModels(ResponseInterface $response, string $model, ?string $key = null): array
    {
        if (!is_subclass_of($model, AbstractModel::class)) {
            throw new InvalidArgumentException('Invalid class string. Class must be instance of ModelInterface');
        }
        if ($response->getStatusCode() !== 200) {
            return [];
        }
        $responseJson = $this->parseResponseAsArray($response);
        if ($responseJson === null || !is_array($responseJson)) {
            return [];
        }
        if (is_string($key) && is_array($responseJson[$key] ?? null)) {
            $responseJson = $responseJson[$key];
        }

        /** @var T[] $result */
        $result = array_map(
            fn(array $jsonModel) => $model::fromArray($jsonModel),
            $responseJson
        );
        return array_filter($result);
    }
}