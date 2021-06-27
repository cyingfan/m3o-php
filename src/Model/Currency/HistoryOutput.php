<?php
declare(strict_types=1);

namespace M3O\Model\Currency;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class HistoryOutput extends HistoryInput
{
    /** @var array<string, float>[]  */
    private array $rates;

    /**
     * @return array<string, float>[]
     */
    public function getRates(): array
    {
        return $this->rates;
    }

    /**
     * @param array<string, float>[] $rates
     * @return $this
     */
    public function setRates(array $rates): HistoryOutput
    {
        $this->rates = $rates;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): HistoryOutput
    {
        return (new HistoryOutput())
            ->setCode((string) ($array['code'] ?? ''))
            ->setDate($array['date'] ?? '')
            ->setRates((array) ($array['rates'] ?? []));
    }

    public function toArray(): array
    {
        return parent::toArray() + ['rates' => $this->getRates()];
    }
}