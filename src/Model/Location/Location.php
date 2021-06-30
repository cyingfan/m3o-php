<?php
declare(strict_types=1);

namespace M3O\Model\Location;


use M3O\Model\AbstractModel;

class Location extends AbstractModel
{
    private float $latitude;
    private float $longitude;
    private int $timestamp;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): Location
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): Location
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): Location
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public static function fromArray(array $array): Location
    {
        return (new Location())
            ->setLongitude((float) ($array['longitude'] ?? 0.0))
            ->setLatitude((float) ($array['latitude'] ?? 0.0))
            ->setTimestamp((int) ($array['timestamp'] ?? 0));
    }

    public function toArray(): array
    {
        return [
            'longitude' => $this->getLongitude(),
            'latitude' => $this->getLatitude(),
            'timestamp' => $this->getTimestamp()
        ];
    }
}