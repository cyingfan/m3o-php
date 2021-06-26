<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Cache\KeyValue;
use M3O\Model\Cache\KeyValueTtl;

class Cache extends AbstractService
{
    public function getServiceName(): string
    {
        return 'cache';
    }

    /**
     * @throws GuzzleException
     */
    public function decrement(KeyValue $keyValue): ?KeyValue
    {
        $response = $this->request('Decrement', $keyValue->toArray());
        return $this->parseResponseAsModel($response, KeyValue::class);
    }

    /**
     * @throws GuzzleException
     */
    public function increment(KeyValue $keyValue): ?KeyValue
    {
        $response = $this->request('Increment', $keyValue->toArray());
        if ($response->getStatusCode() === 500) {
            return null;
        }
        $responseJson = $this->parseResponseAsArray($response);
        if ($responseJson === null) {
            return null;
        }
        return KeyValue::fromArray($responseJson);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $key): bool
    {
        $response = $this->request('Decrement', ['key' => $key]);
        if ($response->getStatusCode() === 500) {
            return false;
        }
        $responseJson = $this->parseResponseAsArray($response);
        return ($responseJson['status'] ?? '') === 'ok';
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $key): ?KeyValueTtl
    {
        $response = $this->request('Get', ['key' => $key]);
        if ($response->getStatusCode() === 500) {
            return null;
        }
        $responseJson = $this->parseResponseAsArray($response);
        if ($responseJson === null) {
            return null;
        }
        return KeyValueTtl::fromArray($responseJson);
    }

    /**
     * @throws GuzzleException
     */
    public function set(KeyValueTtl $keyValue): bool
    {
        $response = $this->request('Set', $keyValue->toArray());
        if ($response->getStatusCode() === 500) {
            return false;
        }
        $responseJson = $this->parseResponseAsArray($response);
        return ($responseJson['status'] ?? '') === 'ok';
    }
}