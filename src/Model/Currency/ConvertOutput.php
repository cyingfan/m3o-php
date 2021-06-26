<?php
declare(strict_types=1);

namespace M3O\Model\Currency;


class ConvertOutput extends ConvertInput
{
    private float $rate;

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }

    public static function fromArray(array $array): ConvertOutput
    {
        return (new ConvertOutput())
            ->setAmount((float) ($array['amount'] ?? 1.0))
            ->setFrom((string) ($array['from'] ?? ''))
            ->setTo((string) ($array['to'] ?? ''))
            ->setRate((float) ($array['rate'] ?? 0.0));
    }

    public function toArray(): array
    {
        return parent::toArray() + ['rate' => $this->getRate()];
    }
}