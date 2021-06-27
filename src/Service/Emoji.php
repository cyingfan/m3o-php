<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use M3O\Model\Emoji\SendInput;
use M3O\Util\PhoneValidator;

class Emoji extends AbstractService
{
    private PhoneValidator $phoneValidator;

    public function __construct(ClientInterface $client, PhoneValidator $phoneValidator)
    {
        parent::__construct($client);
        $this->phoneValidator = $phoneValidator;
    }

    public function getServiceName(): string
    {
        return 'emoji';
    }

    /**
     * @throws GuzzleException
     */
    public function find(string $alias): ?string
    {
        $response = $this->request('Find', ['alias' => $alias]);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return $json['emoji'] ?? null;
    }

    /**
     * @throws GuzzleException
     */
    public function flag(string $countryCode): ?string
    {
        $response = $this->request('Flag', ['code' => $countryCode]);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return $json['flag'] ?? null;
    }

    /**
     * @throws GuzzleException
     */
    public function print(string $text): ?string
    {
        $response = $this->request('Print', ['text' => $text]);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return $json['text'] ?? null;
    }

    /**
     * @throws GuzzleException
     */
    public function send(SendInput $input): bool
    {
        if (!$this->phoneValidator->validatePhone($input->getTo())) {
            throw new InvalidArgumentException('Invalid phone number format.');
        }
        $response = $this->request('Send', $input->toArray());
        if ($response->getStatusCode() !== 200) {
            return false;
        }
        $json = $this->parseResponseAsArray($response);
        return ($json['success'] ?? false) === true;
    }
}