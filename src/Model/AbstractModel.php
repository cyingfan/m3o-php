<?php


namespace M3O\Model;


use InvalidArgumentException;
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

    /**
     * @template T of AbstractModel
     * @param T[]|array[] $array
     * @param class-string<T> $modelClass
     * @return T[]
     */
    public function castModelArray(array $array, string $modelClass): array
    {
        if (!is_subclass_of($modelClass, AbstractModel::class)) {
            throw new InvalidArgumentException('Invalid class string. Class must be instance of ModelInterface');
        }
        return array_filter(array_map(
            static function ($i) use ($modelClass) {
                if (is_array($i)) {
                    return $modelClass::fromArray($i);
                } elseif (is_a($i, $modelClass)) {
                    return $i;
                }
                return null;
            },
            $array
        ));
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}