<?php
declare(strict_types=1);

namespace M3O\Model\Forex;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class HistoryOutput extends AbstractModel
{
    private float $close;
    private DateTimeInterface $date;
    private float $high;
    private float $low;
    private float $open;
    private string $symbol;
    private float $volume;

    public function getClose(): float
    {
        return $this->close;
    }

    public function setClose(float $close): HistoryOutput
    {
        $this->close = $close;
        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return HistoryOutput
     * @throws Exception
     */
    public function setDate($date): HistoryOutput
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function getHigh(): float
    {
        return $this->high;
    }

    public function setHigh(float $high): HistoryOutput
    {
        $this->high = $high;
        return $this;
    }

    public function getLow(): float
    {
        return $this->low;
    }

    public function setLow(float $low): HistoryOutput
    {
        $this->low = $low;
        return $this;
    }

    public function getOpen(): float
    {
        return $this->open;
    }

    public function setOpen(float $open): HistoryOutput
    {
        $this->open = $open;
        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): HistoryOutput
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function setVolume(float $volume): HistoryOutput
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): HistoryOutput
    {
        return (new HistoryOutput())
            ->setClose((float) ($array['close'] ?? 0.0))
            ->setDate($array['date'] ?? 'now')
            ->setHigh((float) ($array['high'] ?? 0.0))
            ->setLow((float) ($array['low'] ?? 0.0))
            ->setOpen((float) ($array['open'] ?? 0.0))
            ->setSymbol((string) ($array['symbol'] ?? ''))
            ->setVolume((float) ($array['volume'] ?? 0.0));
    }

    public function toArray(): array
    {
        return [
            'close' => $this->getClose(),
            'date' => $this->getDate(),
            'high' => $this->getHigh(),
            'low' => $this->getLow(),
            'open' => $this->getOpen(),
            'symbol' => $this->getSymbol(),
            'volume' => $this->getVolume()
        ];
    }
}