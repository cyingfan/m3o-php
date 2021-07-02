<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use Exception;

class QuoteOutput extends Order
{
    private string $symbol;

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): QuoteOutput
    {
        $this->symbol = $symbol;
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
            ->setAskSize((int) ($array['askSize'] ?? 0))
            ->setBidSize((int) ($array['bidSize'] ?? 0))
            ->setTimestamp(($array['bidSize'] ?? 'now'))
            ->setSymbol((string) ($array['symbol'] ?? ''));
    }

    public function toArray(): array
    {
        return parent::toArray() + ['symbol' => $this->getSymbol()];
    }

}
