<?php


namespace M3O\Model\Currency;


use M3O\Model\ModelInterface;

class Code implements ModelInterface
{
    private string $currency;
    private string $name;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Code
    {
        $this->currency = $currency;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Code
    {
        $this->name = $name;
        return $this;
    }

    public static function fromArray(array $array): Code
    {
        return (new Code())
            ->setCurrency((string) ($array['currency'] ?? ''))
            ->setName((string) ($array['name'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'currency' => $this->getCurrency(),
            'name' => $this->getName()
        ];
    }
}