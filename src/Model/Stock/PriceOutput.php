<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use M3O\Model\AbstractModel;

class PriceOutput extends AbstractModel
{
    private float $price;
    private string $symbol;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): PriceOutput
    {
        $this->price = $price;
        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): PriceOutput
    {
        $this->symbol = $symbol;
        return $this;
    }

    public static function fromArray(array $array): PriceOutput
    {
        return (new PriceOutput())
            ->setPrice((float) ($array['price'] ?? 0.0))
            ->setSymbol((string) ($array['symbol'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'price' => $this->getPrice(),
            'symbol' => $this->getSymbol()
        ];
    }
}
