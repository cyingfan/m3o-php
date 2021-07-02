<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Exception;
use M3O\Model\AbstractModel;

class Order extends AbstractModel
{
    private float $askPrice;
    private int $askSize;
    private float $bidPrice;
    private int $bidSize;
    private DateTimeInterface $timestamp;

    public function getAskPrice(): float
    {
        return $this->askPrice;
    }

    /**
     * @param float $askPrice
     * @return static
     */
    public function setAskPrice(float $askPrice)
    {
        $this->askPrice = $askPrice;
        return $this;
    }

    public function getAskSize(): int
    {
        return $this->askSize;
    }

    /**
     * @param int $askSize
     * @return static
     */
    public function setAskSize(int $askSize)
    {
        $this->askSize = $askSize;
        return $this;
    }

    public function getBidPrice(): float
    {
        return $this->bidPrice;
    }

    /**
     * @param float $bidPrice
     * @return static
     */
    public function setBidPrice(float $bidPrice)
    {
        $this->bidPrice = $bidPrice;
        return $this;
    }

    public function getBidSize(): int
    {
        return $this->bidSize;
    }

    /**
     * @param int $bidSize
     * @return static
     */
    public function setBidSize(int $bidSize)
    {
        $this->bidSize = $bidSize;
        return $this;
    }

    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface|string $timestamp
     * @return static
     * @throws Exception
     */
    public function setTimestamp($timestamp)
    {
        if (is_string($timestamp)) {
            $timestamp = new DateTimeImmutable($timestamp);
        }
        $this->timestamp = new DateTimeImmutable(
            $timestamp->format(DateTimeInterface::RFC3339_EXTENDED),
            new DateTimeZone('UTC')
        );
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): Order
    {
        return (new Order())
            ->setAskPrice((float) ($array['askPrice'] ?? 0.0))
            ->setBidPrice((float) ($array['bidPrice'] ?? 0.0))
            ->setAskSize((int) ($array['askSize'] ?? 0))
            ->setBidSize((int) ($array['bidSize'] ?? 0))
            ->setTimestamp(($array['bidSize'] ?? 'now'));
    }

    public function toArray(): array
    {
        return [
            'askPrice' => $this->getAskPrice(),
            'askSize' => $this->getAskSize(),
            'bidPrice' => $this->getBidPrice(),
            'bidSize' => $this->getBidSize(),
            'timestamp' => $this->getTimestamp()->format(DateTimeInterface::RFC3339_EXTENDED)
        ];
    }
}
