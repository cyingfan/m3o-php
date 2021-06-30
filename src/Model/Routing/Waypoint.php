<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class Waypoint extends AbstractModel
{
    private Location $location;
    private string $name;

    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|array<string, float> $location
     * @return Waypoint
     */
    public function setLocation($location): Waypoint
    {
        if (is_array($location)) {
            $location = Location::fromArray($location);
        }
        $this->location = $location;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Waypoint
    {
        $this->name = $name;
        return $this;
    }

    public static function fromArray(array $array): Waypoint
    {
        return (new Waypoint())
            ->setLocation($array['location'] ?? [])
            ->setName((string) ($array['name'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'location' => $this->getLocation()->toArray(),
            'name' => $this->getName()
        ];
    }
}