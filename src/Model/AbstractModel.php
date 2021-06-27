<?php


namespace M3O\Model;


use JsonSerializable;

abstract class AbstractModel implements JsonSerializable
{
    /**
     * @param array<string, mixed> $array
     * @return static
     */
    abstract public static function fromArray(array $array): self;

    /**
     * @return array<string, mixed>
     */
    abstract public function toArray(): array;

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}