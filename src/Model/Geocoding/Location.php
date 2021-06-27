<?php
declare(strict_types=1);

namespace M3O\Model\Geocoding;


use M3O\Model\AbstractModel;

class Location extends AbstractModel
{
    private float $latitute;
    private float $longitude;

    public function getLatitute(): float
    {
        return $this->latitute;
    }

    public function setLatitute(float $latitute): Location
    {
        $this->latitute = $latitute;
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

    public static function fromArray(array $array): Location
    {
        return (new Location())
            ->setLatitute((float) ($array['latitude'] ?? 0.0))
            ->setLatitute((float) ($array['longitude'] ?? 0.0));
    }

    public function toArray(): array
    {
        return [
            'latitude' => $this->getLatitute(),
            'longitude' => $this->getLongitude()
        ];
    }
}