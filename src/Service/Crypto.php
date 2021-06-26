<?php
declare(strict_types=1);

namespace M3O\Service;


use Exception;
use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Crypto\History;
use M3O\Model\Crypto\News;

class Crypto extends AbstractService
{
    public function getServiceName(): string
    {
        return 'crypto';
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function history(string $symbol): ?History
    {
        $response = $this->request('History', ['symbol' => $symbol]);
        return $this->parseResponseAsModel($response, History::class);
    }


    public function news(string $symbol): ?News
    {
        $response = $this->request('News', ['symbol' => $symbol]);
        return $this->parseResponseAsModel($response, News::class);
    }
}