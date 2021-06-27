<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;

class Helloworld extends AbstractService
{
    public function getServiceName(): string
    {
        return 'helloworld';
    }

    /**
     * @throws GuzzleException
     */
    public function call(string $name): ?string
    {
        $response = $this->request('Call', ['name' => $name]);
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return $json['message'] ?? null;
    }
}