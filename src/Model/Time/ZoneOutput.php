<?php
declare(strict_types=1);

namespace M3O\Model\Time;


use M3O\Model\AbstractModel;

class ZoneOutput extends AbstractModel
{
    private string $abbreviation;
    private string $country;
    private bool $dst;
    private float $latitude;
    private string $localtime;
    private string $location;
    private float $longitude;
    private string $region;
    private string $timezone;

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): ZoneOutput
    {
        $this->abbreviation = $abbreviation;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): ZoneOutput
    {
        $this->country = $country;
        return $this;
    }

    public function getDst(): bool
    {
        return $this->dst;
    }

    public function setDst(bool $dst): ZoneOutput
    {
        $this->dst = $dst;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): ZoneOutput
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLocaltime(): string
    {
        return $this->localtime;
    }

    public function setLocaltime(string $localtime): ZoneOutput
    {
        $this->localtime = $localtime;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): ZoneOutput
    {
        $this->location = $location;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): ZoneOutput
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): ZoneOutput
    {
        $this->region = $region;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): ZoneOutput
    {
        $this->timezone = $timezone;
        return $this;
    }

    public static function fromArray(array $array): ZoneOutput
    {
        return (new ZoneOutput())
            ->setAbbreviation((string) ($array['abbreviation'] ?? ''))
            ->setCountry((string) ($array['country'] ?? ''))
            ->setLocaltime((string) ($array['localtime'] ?? ''))
            ->setLocation((string) ($array['location'] ?? ''))
            ->setRegion((string) ($array['region'] ?? ''))
            ->setTimezone((string) ($array['timezone'] ?? ''))
            ->setDst((bool) ($array['dst'] ?? false))
            ->setLatitude((float) ($array['latitude'] ?? 0.0))
            ->setLongitude((float) ($array['longitude'] ?? 0.0));
    }

    public function toArray(): array
    {
        return [
            'abbreviation' => $this->getAbbreviation(),
            'country' => $this->getCountry(),
            'dst' => $this->getDst(),
            'latitude' => $this->getLatitude(),
            'localtime' => $this->getLocaltime(),
            'location' => $this->getLocation(),
            'longitude' => $this->getLongitude(),
            'region' => $this->getRegion(),
            'timezone' => $this->getTimezone()
        ];
    }
}
