<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Url\UrlPair;

class Url extends AbstractService
{
    public function getServiceName(): string
    {
        return 'url';
    }

    /**
     * @return UrlPair[]
     * @throws GuzzleException
     */
    public function list(): array
    {
        $response = $this->request('List', []);
        return $this->parseResponseAsModels($response, UrlPair::class, 'urlPairs');
    }

    /**
     * @throws GuzzleException
     */
    public function proxy(string $shortURL): ?string
    {
        $response = $this->request('Proxy', ['shortURL' => $shortURL]);
        $json = $this->parseResponseAsArray($response);
        return $json['destinationURL'] ?? null;
    }

    public function shorten(string $destinationURL): ?string
    {
        $response = $this->request('Shorten', ['destinationURL' => $destinationURL]);
        $json = $this->parseResponseAsArray($response);
        return $json['shortURL'] ?? null;
    }
}
