<?php
declare(strict_types=1);

namespace M3O\Model\Cache;

class KeyValueTtl extends KeyValue
{
    private int $ttl;

    public function getTtl(): int
    {
        return $this->ttl;
    }

    public function setTtl(int $ttl): self
    {
        $this->ttl = $ttl;
        return $this;
    }

    public static function fromArray(array $array): KeyValueTtl
    {
        return (new KeyValueTtl())
            ->setKey((string) ($array['key'] ?? ''))
            ->setValue($array['value'] ?? '')
            ->setTtl((int) ($array['ttl'] ?? 0));
    }

    public function toArray(): array
    {
        return parent::toArray() + ['ttl' => $this->getTtl()];
    }
}