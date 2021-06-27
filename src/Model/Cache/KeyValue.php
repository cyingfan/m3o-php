<?php
declare(strict_types=1);

namespace M3O\Model\Cache;

use M3O\Model\AbstractModel;

class KeyValue extends AbstractModel
{
    private string $key;
    /** @var string|int */
    private $value;


    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return static
     */
    public function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|string $value
     * @return static
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param array<string, mixed> $array
     * @return KeyValue
     */
    public static function fromArray(array $array): KeyValue
    {
        return (new KeyValue())
            ->setKey((string) ($array['key'] ?? ''))
            ->setValue($array['value'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'key' => $this->getKey(),
            'value' => $this->getValue()
        ];
    }

}