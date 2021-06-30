<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class DirectionsOutput extends RouteOutput
{
    /** @var Direction[] */
    private array $directions;

    /**
     * @return Direction[]
     */
    public function getDirections(): array
    {
        return $this->directions;
    }

    /**
     * @param Direction[]|array[] $directions
     * @return DirectionsOutput
     */
    public function setDirections(array $directions): DirectionsOutput
    {
        $this->directions = $this->castModelArray($directions, Direction::class);
        return $this;
    }

    public static function fromArray(array $array): DirectionsOutput
    {
        return (new DirectionsOutput())
            ->setDirections($array['directions'] ?? [])
            ->setDistance((float) ($array['distance'] ?? 0.0))
            ->setDuration((float) ($array['duration'] ?? 0.0))
            ->setWaypoints($array['waypoints'] ?? []);
    }

    public function toArray(): array
    {
        return parent::toArray() + [
            'directions' => array_map(fn(Direction $d) => $d->toArray(), $this->getDirections()),
        ];
    }
}