<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class RouteOutput extends AbstractModel
{
    private float $distance;
    private float $duration;
    /** @var Waypoint[] */
    private array $waypoints;

    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     * @return static
     */
    public function setDistance(float $distance)
    {
        $this->distance = $distance;
        return $this;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     * @return static
     */
    public function setDuration(float $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return Waypoint[]
     */
    public function getWaypoints(): array
    {
        return $this->waypoints;
    }

    /**
     * @param Waypoint[]|array[] $waypoints
     * @return static
     */
    public function setWaypoints(array $waypoints)
    {
        $this->waypoints = $this->castModelArray($waypoints, Waypoint::class);
        return $this;
    }

    public static function fromArray(array $array): RouteOutput
    {
        return (new RouteOutput())
            ->setDistance((float) ($array['distance'] ?? 0.0))
            ->setDuration((float) ($array['duration'] ?? 0.0))
            ->setWaypoints($array['waypoints'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'distance' => $this->getDistance(),
            'duration' => $this->getDuration(),
            'waypoints' => array_map(fn(Waypoint $w) => $w->toArray(), $this->getWaypoints())
        ];
    }
}