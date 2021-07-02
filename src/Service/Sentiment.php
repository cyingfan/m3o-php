<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Sentiment\AnalyzeInput;

class Sentiment extends AbstractService
{
    public function getServiceName(): string
    {
        return 'sentiment';
    }

    /**
     * @throws GuzzleException
     */
    public function analyze(AnalyzeInput $input): ?int
    {
        $response = $this->request('Analyze', $input->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['score'] ?? null;
    }
}
