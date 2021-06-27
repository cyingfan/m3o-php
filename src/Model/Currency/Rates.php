<?php


namespace M3O\Model\Currency;


use M3O\Model\AbstractModel;

class Rates extends AbstractModel
{
    private string $code;
    /** @var array<string, float> */
    private array $rates;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Rates
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return array<string, float>
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param array<string, float> $rates
     * @return Rates
     */
    public function setRates(array $rates): Rates
    {
        $this->rates = $rates;
        return $this;
    }

    public static function fromArray(array $array): Rates
    {
        return (new Rates())
            ->setCode((string) ($array['code'] ?? ''))
            ->setRates((array) ($array['rates'] ?? []));
    }

    public function toArray(): array
    {
        return [
            'code' => $this->getCode(),
            'rate' => $this->getRates()
        ];
    }
}