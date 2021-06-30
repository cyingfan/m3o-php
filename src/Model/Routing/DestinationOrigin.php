<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class DestinationOrigin extends AbstractModel
{
    private Location $destination;
    private Location $origin;

    public function getDestination(): Location
    {
        return $this->destination;
    }

    /**
     * @param Location|array<string, float> $destination
     * @return DestinationOrigin
     */
    public function setDestination($destination): DestinationOrigin
    {
        if (is_array($destination)) {
            $destination = Location::fromArray($destination);
        }
        $this->destination = $destination;
        return $this;
    }

    public function getOrigin(): Location
    {
        return $this->origin;
    }

    /**
     * @param Location|array<string, float> $origin
     * @return DestinationOrigin
     */
    public function setOrigin($origin): DestinationOrigin
    {
        if (is_array($origin)) {
            $origin = Location::fromArray($origin);
        }
        $this->origin = $origin;
        return $this;
    }

    public static function fromArray(array $array): DestinationOrigin
    {
        return (new DestinationOrigin())
            ->setDestination($array['destination'] ?? [])
            ->setOrigin($array['origin'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'destination' => $this->getDestination()->toArray(),
            'origin' => $this->getOrigin()->toArray()
        ];
    }
}