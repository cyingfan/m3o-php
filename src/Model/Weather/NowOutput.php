<?php
declare(strict_types=1);

namespace M3O\Model\Weather;


use M3O\Model\AbstractModel;

class NowOutput extends AbstractModel
{
    private float $cloud;
    private string $condition;
    private string $country;
    private bool $daytime;
    private float $feelsLikeC;
    private float $feelsLikeF;
    private float $humidity;
    private string $iconUri;
    private float $latitude;
    private string $localTime;
    private string $location;
    private float $longitude;
    private string $region;
    private float $tempC;
    private float $tempF;
    private string $timezone;
    private float $windDegree;
    private string $windDirection;
    private float $windKph;
    private float $windMph;

    public function getCloud(): float
    {
        return $this->cloud;
    }

    public function setCloud(float $cloud): NowOutput
    {
        $this->cloud = $cloud;
        return $this;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): NowOutput
    {
        $this->condition = $condition;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): NowOutput
    {
        $this->country = $country;
        return $this;
    }

    public function getDaytime(): bool
    {
        return $this->daytime;
    }

    public function setDaytime(bool $daytime): NowOutput
    {
        $this->daytime = $daytime;
        return $this;
    }

    public function getFeelsLikeC(): float
    {
        return $this->feelsLikeC;
    }

    public function setFeelsLikeC(float $feelsLikeC): NowOutput
    {
        $this->feelsLikeC = $feelsLikeC;
        return $this;
    }

    public function getFeelsLikeF(): float
    {
        return $this->feelsLikeF;
    }

    public function setFeelsLikeF(float $feelsLikeF): NowOutput
    {
        $this->feelsLikeF = $feelsLikeF;
        return $this;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function setHumidity(float $humidity): NowOutput
    {
        $this->humidity = $humidity;
        return $this;
    }

    public function getIconUri(): string
    {
        return $this->iconUri;
    }

    public function setIconUri(string $iconUri): NowOutput
    {
        $this->iconUri = $iconUri;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): NowOutput
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLocalTime(): string
    {
        return $this->localTime;
    }

    public function setLocalTime(string $localTime): NowOutput
    {
        $this->localTime = $localTime;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): NowOutput
    {
        $this->location = $location;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): NowOutput
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): NowOutput
    {
        $this->region = $region;
        return $this;
    }

    public function getTempC(): float
    {
        return $this->tempC;
    }

    public function setTempC(float $tempC): NowOutput
    {
        $this->tempC = $tempC;
        return $this;
    }

    public function getTempF(): float
    {
        return $this->tempF;
    }

    public function setTempF(float $tempF): NowOutput
    {
        $this->tempF = $tempF;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): NowOutput
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function getWindDegree(): float
    {
        return $this->windDegree;
    }

    public function setWindDegree(float $windDegree): NowOutput
    {
        $this->windDegree = $windDegree;
        return $this;
    }

    public function getWindDirection(): string
    {
        return $this->windDirection;
    }

    public function setWindDirection(string $windDirection): NowOutput
    {
        $this->windDirection = $windDirection;
        return $this;
    }

    public function getWindKph(): float
    {
        return $this->windKph;
    }

    public function setWindKph(float $windKph): NowOutput
    {
        $this->windKph = $windKph;
        return $this;
    }

    public function getWindMph(): float
    {
        return $this->windMph;
    }

    public function setWindMph(float $windMph): NowOutput
    {
        $this->windMph = $windMph;
        return $this;
    }

    public static function fromArray(array $array): NowOutput
    {
        return (new NowOutput())
            ->setCloud((float) ($array['cloud'] ?? 0.0))
            ->setCondition((string) ($array['condition'] ?? ''))
            ->setCountry((string) ($array['country'] ?? ''))
            ->setDaytime((bool) ($array['daytime'] ?? false))
            ->setFeelsLikeC((float) ($array['feelsLikeC'] ?? 0.0))
            ->setFeelsLikeF((float) ($array['feelsLikeF'] ?? 0.0))
            ->setHumidity((float) ($array['humidity'] ?? 0.0))
            ->setIconUri((string) ($array['iconUri'] ?? ''))
            ->setLatitude((float) ($array['latitude'] ?? 0.0))
            ->setLocalTime((string) ($array['localTime'] ?? ''))
            ->setLocation((string) ($array['location'] ?? ''))
            ->setLongitude((float) ($array['longitude'] ?? 0.0))
            ->setRegion((string) ($array['region'] ?? ''))
            ->setTempC((float) ($array['tempC'] ?? 0.0))
            ->setTempF((float) ($array['tempF'] ?? 0.0))
            ->setTimezone((string) ($array['timezone'] ?? 0.0))
            ->setWindDegree((float) ($array['windDegree'] ?? 0.0))
            ->setWindDirection((string) ($array['windDirection'] ?? ''))
            ->setWindKph((float) ($array['windKph'] ?? 0.0))
            ->setWindMph((float) ($array['windMph'] ?? 0.0));
    }

    public function toArray(): array
    {
        return [
            'cloud' => $this->getCloud(),
            'condition' => $this->getCondition(),
            'country' => $this->getCountry(),
            'dayTime' => $this->getDaytime(),
            'feelsLikeC' => $this->getFeelsLikeC(),
            'feelsLikeF' => $this->getFeelsLikeF(),
            'humidity' => $this->getHumidity(),
            'iconUri' => $this->getIconUri(),
            'latitude' => $this->getLatitude(),
            'localTime' => $this->getLocalTime(),
            'location' => $this->getLocation(),
            'longitude' => $this->getLongitude(),
            'region' => $this->getRegion(),
            'tempC' => $this->getTempC(),
            'tempF' => $this->getTempF(),
            'timezone' => $this->getTimezone(),
            'windDegree' => $this->getWindDegree(),
            'windDirection' => $this->getWindDirection(),
            'windKph' => $this->getWindKph(),
            'windMph' => $this->getWindMph(),
        ];
    }
}
