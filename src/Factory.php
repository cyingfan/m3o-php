<?php
declare(strict_types=1);

namespace M3O;


use GuzzleHttp\Client;
use M3O\Util\PhoneValidator;
use RuntimeException;

class Factory
{
    public function getM3O(): M3O
    {
        return new M3O($this->getHttpClient(), $this->getPhoneValidator());
    }

    public function getHttpClient(): Client
    {
        $base_uri = getenv('M3O_BASE_URI');
        if (!$base_uri) {
            $base_uri = 'https://api.m3o.com/v1/';
        }
        $authToken = getenv('M3O_AUTH_TOKEN');
        if (!$authToken) {
            throw new RuntimeException('M3O auth token needs to be set on environment variable: M3O_AUTH_TOKEN');
        }
        return new Client([
            'base_uri' => $base_uri,
            'http_errors' => false,
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $authToken)
            ]
        ]);
    }

    public function getPhoneValidator(): PhoneValidator
    {
        return new PhoneValidator();
    }
}