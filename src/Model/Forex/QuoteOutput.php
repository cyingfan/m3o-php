<?php
declare(strict_types=1);

namespace M3O\Model\Forex;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class QuoteOutput extends AbstractModel
{
    private float $askPrice;
    private float $bidPrice;
    private string $symbol;
    private DateTimeInterface $timestamp;

    public function getAskPrice(): float
    {
        return $this->askPrice;
    }

    public function setAskPrice(float $askPrice): QuoteOutput
    {
        $this->askPrice = $askPrice;
        return $this;
    }

    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    public function setBidPrice(float $bidPrice): QuoteOutput
    {
        $this->bidPrice = $bidPrice;
        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): QuoteOutput
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface|string $timestamp
     * @return QuoteOutput
     * @throws Exception
     */
    public function setTimestamp($timestamp): QuoteOutput
    {
        if (is_string($timestamp)) {
            $timestamp = new DateTimeImmutable($timestamp);
        }
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): QuoteOutput
    {
        return (new QuoteOutput())
            ->setAskPrice((float) ($array['askPrice'] ?? 0.0))
            ->setBidPrice((float) ($array['bidPrice'] ?? 0.0))
            ->setSymbol((string) ($array['symbol'] ?? ''))
            ->setTimestamp($array['timestamp'] ?? 'now');
    }

    public function toArray(): array
    {
        return [
            'askPrice' => $this->getAskPrice(),
            'bidPrice' => $this->getBidPrice(),
            'symbol' => $this->getSymbol(),
            'timestamp' => $this->getTimestamp()
        ];
    }
}