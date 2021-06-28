<?php
declare(strict_types=1);

namespace M3O\Model\Ip;


use M3O\Model\AbstractModel;

class LookupOutput extends AbstractModel
{
    private string $asn;
    private string $city;
    private string $continent;
    private string $country;
    private string $ip;
    private float $latitude;
    private float $longitude;
    private string $timezone;

    public function getAsn(): string
    {
        return $this->asn;
    }

    public function setAsn(string $asn): LookupOutput
    {
        $this->asn = $asn;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): LookupOutput
    {
        $this->city = $city;
        return $this;
    }

    public function getContinent(): string
    {
        return $this->continent;
    }

    public function setContinent(string $continent): LookupOutput
    {
        $this->continent = $continent;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): LookupOutput
    {
        $this->country = $country;
        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): LookupOutput
    {
        $this->ip = $ip;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): LookupOutput
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): LookupOutput
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): LookupOutput
    {
        $this->timezone = $timezone;
        return $this;
    }

    public static function fromArray(array $array): LookupOutput
    {
        return (new LookupOutput())
            ->setAsn((string) ($array['asn'] ?? ''))
            ->setCity((string) ($array['city'] ?? ''))
            ->setContinent((string) ($array['continent'] ?? ''))
            ->setCountry((string) ($array['country'] ?? ''))
            ->setIp((string) ($array['ip'] ?? ''))
            ->setTimezone((string) ($array['timezone'] ?? ''))
            ->setLatitude((float) ($array['latitude'] ?? 0.0))
            ->setLongitude((float) ($array['longitude'] ?? 0.0));
    }

    public function toArray(): array
    {
        return [
            'asn' => $this->getAsn(),
            'city' => $this->getCity(),
            'continent' => $this->getContinent(),
            'country' => $this->getCountry(),
            'ip' => $this->getIp(),
            'timezone' => $this->getTimezone(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude()
        ];
    }
}