<?php
declare(strict_types=1);

namespace M3O\Model\Weather;


use M3O\Model\AbstractModel;

class ForecastOutput extends AbstractModel
{
    private string $country;
    /** @var Forecast[] */
    private array $forecast;
    private float $latitude;
    private string $localTime;
    private string $location;
    private float $longitude;
    private string $region;
    private string $timezone;

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): ForecastOutput
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return Forecast[]
     */
    public function getForecast(): array
    {
        return $this->forecast;
    }

    /**
     * @param Forecast[]|array<int, array> $forecast
     * @return ForecastOutput
     */
    public function setForecast(array $forecast): ForecastOutput
    {
        $this->forecast = $this->castModelArray($forecast, Forecast::class);
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): ForecastOutput
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLocalTime(): string
    {
        return $this->localTime;
    }

    public function setLocalTime(string $localTime): ForecastOutput
    {
        $this->localTime = $localTime;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): ForecastOutput
    {
        $this->location = $location;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): ForecastOutput
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): ForecastOutput
    {
        $this->region = $region;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): ForecastOutput
    {
        $this->timezone = $timezone;
        return $this;
    }

    public static function fromArray(array $array): ForecastOutput
    {
        return (new ForecastOutput())
            ->setCountry((string) ($array['country'] ?? ''))
            ->setForecast((array) ($array['forecast'] ?? []))
            ->setLatitude((float) ($array['latitude'] ?? 0.0))
            ->setLongitude((float) ($array['longitude'] ?? 0.0))
            ->setLocalTime((string) ($array['localtime'] ?? ''))
            ->setLocation((string) ($array['location'] ?? ''))
            ->setRegion((string) ($array['region'] ?? ''))
            ->setTimezone((string) ($array['timezone'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'country' => $this->getCountry(),
            'forecast' => array_map(fn(Forecast $f) => $f->toArray(), $this->getForecast()),
            'latitude' => $this->getLatitude(),
            'localTime' => $this->getLocalTime(),
            'location' => $this->getLocation(),
            'longitude' => $this->getLongitude(),
            'region' => $this->getRegion(),
            'timezone' => $this->getTimezone()
        ];
    }
}
