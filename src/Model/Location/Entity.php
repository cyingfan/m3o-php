<?php
declare(strict_types=1);

namespace M3O\Model\Location;


use M3O\Model\AbstractModel;

class Entity extends AbstractModel
{
    private string $id;
    private string $type;
    private Location $location;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Entity
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Entity
    {
        $this->type = $type;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|array<string, mixed> $location
     * @return $this
     */
    public function setLocation($location): Entity
    {
        if (is_array($location)) {
            $location = Location::fromArray($location);
        }
        $this->location = $location;
        return $this;
    }

    public static function fromArray(array $array): Entity
    {
        return (new Entity())
            ->setId((string) ($array['id'] ?? ''))
            ->setType((string) ($array['type'] ?? ''))
            ->setLocation($array['location'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'location' => $this->getLocation()->toArray()
        ];
    }
}