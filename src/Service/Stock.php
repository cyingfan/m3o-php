<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Stock\HistoryInput;
use M3O\Model\Stock\HistoryOutput;
use M3O\Model\Stock\OrderBookInput;
use M3O\Model\Stock\OrderBookOutput;
use M3O\Model\Stock\PriceOutput;
use M3O\Model\Stock\QuoteOutput;

class Stock extends AbstractService
{
    public function getServiceName(): string
    {
        return 'stock';
    }

    /**
     * @throws GuzzleException
     */
    public function history(HistoryInput $input): ?HistoryOutput
    {
        $response = $this->request('History', $input->toArray());
        return $this->parseResponseAsModel($response, HistoryOutput::class);
    }

    /**
     * @throws GuzzleException
     */
    public function orderBook(OrderBookInput $input): ?OrderBookOutput
    {
        $response = $this->request('OrderBook', $input->toArray());
        return $this->parseResponseAsModel($response, OrderBookOutput::class);
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
