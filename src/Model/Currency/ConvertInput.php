<?php
declare(strict_types=1);

namespace M3O\Model\Currency;


use M3O\Model\ModelInterface;

class ConvertInput implements ModelInterface
{
    private string $from;
    private string $to;
    private float $amount = 0.0;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return static
     */
    public function setFrom(string $from)
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return static
     */
    public function setTo(string $to)
    {
        $this->to = $to;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return static
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public static function fromArray(array $array): ConvertInput
    {
        return (new ConvertInput())
            ->setAmount((float) ($array['amount'] ?? 1.0))
            ->setFrom((string) ($array['from'] ?? ''))
            ->setTo((string) ($array['to'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->getAmount(),
            'from' => $this->getFrom(),
            'to' => $this->getTo()
        ];
    }


}