<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Id\GenerateOutput;

class Id extends AbstractService
{
    public function getServiceName(): string
    {
        return 'id';
    }

    /**
     * @throws GuzzleException
     */
    public function generate(string $type): ?GenerateOutput
    {
        $response = $this->request('Generate', ['type' => $type]);
        return $this->parseResponseAsModel($response, GenerateOutput::class);
    }

    /**
     * @return string[]
     * @throws GuzzleException
     */
    public function types(): array
    {
        $response = $this->request('Types', []);
        if ($response->getStatusCode() !== 200) {
            return [];
        }
        $json = $this->parseResponseAsArray($response);
        return $json['types'] ?? [];
    }
}