<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class Session extends AbstractModel
{
    private float $created;
    private float $expires;
    private string $id;

    public function getCreated(): float
    {
        return $this->created;
    }

    public function setCreated(float $created): Session
    {
        $this->created = $created;
        return $this;
    }

    public function getExpires(): float
    {
        return $this->expires;
    }

    public function setExpires(float $expires): Session
    {
        $this->expires = $expires;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Session
    {
        $this->id = $id;
        return $this;
    }

    public static function fromArray(array $array): Session
    {
        return (new Session())
            ->setCreated((float) ($array['created'] ?? 0.0))
            ->setExpires((float) ($array['expires'] ?? 0.0))
            ->setId((string) ($array['id'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'created' => $this->getCreated(),
            'expires' => $this->getExpires(),
            'id' => $this->getId()
        ];
    }
}
