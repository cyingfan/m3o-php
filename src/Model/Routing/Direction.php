<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class Direction extends AbstractModel
{
    private float $distance;
    private float $duration;
    private string $instruction;
    /** @var Intersection[] */
    private array $intersections;
    private Maneuver $maneuver;
    private string $name;
    private string $reference;

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): Direction
    {
        $this->distance = $distance;
        return $this;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): Direction
    {
        $this->duration = $duration;
        return $this;
    }

    public function getInstruction(): string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): Direction
    {
        $this->instruction = $instruction;
        return $this;
    }

    /**
     * @return Intersection[]
     */
    public function getIntersections(): array
    {
        return $this->intersections;
    }

    /**
     * @param Intersection[]|array[] $intersections
     * @return Direction
     */
    public function setIntersections(array $intersections): Direction
    {
        $this->intersections = $this->castModelArray($intersections, Intersection::class);
        return $this;
    }

    public function getManeuver(): Maneuver
    {
        return $this->maneuver;
    }

    /**
     * @param Maneuver|array<string, mixed> $maneuver
     * @return Direction
     */
    public function setManeuver($maneuver): Direction
    {
        if (is_array($maneuver)) {
            $maneuver = Maneuver::fromArray($maneuver);
        }
        $this->maneuver = $maneuver;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Direction
    {
        $this->name = $name;
        return $this;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): Direction
    {
        $this->reference = $reference;
        return $this;
    }

    public static function fromArray(array $array): Direction
    {
        return (new Direction())
            ->setDistance((float) ($array['distance'] ?? 0.0))
            ->setDuration((float) ($array['duration'] ?? 0.0))
            ->setInstruction((string) ($array['instruction'] ?? ''))
            ->setIntersections((array) ($array['intersections'] ?? []))
            ->setManeuver($array['maneuver'] ?? [])
            ->setName((string) ($array['string'] ?? ''))
            ->setReference((string) ($array['reference'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'distance' => $this->getDistance(),
            'duration' => $this->getDuration(),
            'intersections' => array_map(
                fn(Intersection $i) => $i->toArray(),
                $this->getIntersections()
            ),
            'maneuver' => $this->getManeuver()->toArray(),
            'name' => $this->getName(),
            'reference' => $this->getReference()
        ];
    }
}