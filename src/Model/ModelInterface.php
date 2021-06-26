<?php
declare(strict_types=1);

namespace M3O\Model;


interface ModelInterface
{
    /**
     * @param array<string, mixed> $array
     * @return static
     */
    public static function fromArray(array $array): self;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}