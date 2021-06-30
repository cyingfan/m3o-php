<?php
declare(strict_types=1);

namespace M3O\Model\Location;


use M3O\Model\AbstractModel;

class SearchInput extends AbstractModel
{
    private Location $center;
    private int $numEntities;
    private float $radius;
    private string $type;

    public function getCenter(): Location
    {
        return $this->center;
    }

    public function setCenter(Location $center): SearchInput
    {
        $this->center = $center;
        return $this;
    }

    public function getNumEntities(): int
    {
        return $this->numEntities;
    }

    public function setNumEntities(int $numEntities): SearchInput
    {
        $this->numEntities = $numEntities;
        return $this;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): SearchInput
    {
        $this->radius = $radius;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): SearchInput
    {
        $this->type = $type;
        return $this;
    }

    public static function fromArray(array $array): SearchInput
    {
        return (new SearchInput())
            ->setCenter($array['center'] ?? [])
            ->setNumEntities((int) ($array['numEntities'] ?? 0))
            ->setRadius((float) ($array['radius'] ?? 0.0))
            ->setType((string) ($array['type'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'center' => $this->getCenter()->toArray(),
            'numEntities' => $this->getNumEntities(),
            'radius' => $this->getRadius(),
            'type' => $this->getType()
        ];
    }
}