<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class Intersection extends AbstractModel
{
    /** @var int[] */
    private array $bearings;
    private Location $location;

    /**
     * @return int[]
     */
    public function getBearings(): array
    {
        return $this->bearings;
    }

    /**
     * @param int[] $bearings
     * @return Intersection
     */
    public function setBearings(array $bearings): Intersection
    {
        $this->bearings = $bearings;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|array<string, float> $location
     * @return Intersection
     */
    public function setLocation($location): Intersection
    {
        if (is_array($location)) {
            $location = Location::fromArray($location);
        }
        $this->location = $location;
        return $this;
    }

    public static function fromArray(array $array): Intersection
    {
        return (new Intersection())
            ->setLocation($array['location'] ?? [])
            ->setBearings((array) ($array['bearings'] ?? []));
    }

    public function toArray(): array
    {
        return [
            'location' => $this->getLocation()->toArray(),
            'bearings' => $this->getBearings()
        ];
    }
}