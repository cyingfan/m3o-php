<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Forex\HistoryOutput;
use M3O\Model\Forex\PriceOutput;
use M3O\Model\Forex\QuoteOutput;

class Forex extends AbstractService
{
    public function getServiceName(): string
    {
        return 'forex';
    }

    /**
     * @throws GuzzleException
     */
    public function history(string $symbol): ?HistoryOutput
    {
        $response = $this->request('History', ['symbol' => $symbol]);
        return $this->parseResponseAsModel($response, HistoryOutput::class);
    }

    /**
     * @throws GuzzleException
     */
    public function price(string $symbol): ?PriceOutput
    {
        $response = $this->request('Price', ['symbol' => $symbol]);
        return $this->parseResponseAsModel($response, PriceOutput::class);
    }

    /**
     * @throws GuzzleException
     */
    public function quote(string $symbol): ?QuoteOutput
    {
        $response = $this->request('Quote', ['symbol' => $symbol]);
        return $this->parseResponseAsModel($response, QuoteOutput::class);

    }
}