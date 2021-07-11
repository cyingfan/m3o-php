<?php
declare(strict_types=1);

namespace M3O\Model\Weather;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use M3O\Model\AbstractModel;

class Forecast extends AbstractModel
{
    private float $avgTempC;
    private float $avgTempF;
    private float $chanceofRain;
    private string $condition;
    private DateTimeInterface $date;
    private string $iconUri;
    private float $maxTempC;
    private float $maxTempF;
    private float $minTempC;
    private float $minTempF;
    private string $sunrise;
    private string $sunset;
    private bool $willItRain;

    public function getAvgTempC(): float
    {
        return $this->avgTempC;
    }

    public function setAvgTempC(float $avgTempC): Forecast
    {
        $this->avgTempC = $avgTempC;
        return $this;
    }

    public function getAvgTempF(): float
    {
        return $this->avgTempF;
    }

    public function setAvgTempF(float $avgTempF): Forecast
    {
        $this->avgTempF = $avgTempF;
        return $this;
    }

    public function getChanceofRain(): float
    {
        return $this->chanceofRain;
    }

    public function setChanceofRain(float $chanceofRain): Forecast
    {
        if ($chanceofRain < 0 or $chanceofRain > 100) {
            throw new InvalidArgumentException('Chance of rain must be between 0-100 inclusive.');
        }
        $this->chanceofRain = $chanceofRain;
        return $this;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): Forecast
    {
        $this->condition = $condition;
        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return $this
     * @throws Exception
     */
    public function setDate($date): Forecast
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function getIconUri(): string
    {
        return $this->iconUri;
    }

    public function setIconUri(string $iconUri): Forecast
    {
        $this->iconUri = $iconUri;
        return $this;
    }

    public function getMaxTempC(): float
    {
        return $this->maxTempC;
    }

    public function setMaxTempC(float $maxTempC): Forecast
    {
        $this->maxTempC = $maxTempC;
        return $this;
    }

    public function getMaxTempF(): float
    {
        return $this->maxTempF;
    }

    public function setMaxTempF(float $maxTempF): Forecast
    {
        $this->maxTempF = $maxTempF;
        return $this;
    }

    public function getMinTempC(): float
    {
        return $this->minTempC;
    }

    public function setMinTempC(float $minTempC): Forecast
    {
        $this->minTempC = $minTempC;
        return $this;
    }

    public function getMinTempF(): float
    {
        return $this->minTempF;
    }

    public function setMinTempF(float $minTempF): Forecast
    {
        $this->minTempF = $minTempF;
        return $this;
    }

    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    public function setSunrise(string $sunrise): Forecast
    {
        $this->sunrise = $sunrise;
        return $this;
    }

    public function getSunset(): string
    {
        return $this->sunset;
    }

    public function setSunset(string $sunset): Forecast
    {
        $this->sunset = $sunset;
        return $this;
    }

    public function getWillItRain(): bool
    {
        return $this->willItRain;
    }

    public function setWillItRain(bool $willItRain): Forecast
    {
        $this->willItRain = $willItRain;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): Forecast
    {
        return (new Forecast())
            ->setAvgTempC((float) ($array['avgTempC'] ?? 0.0))
            ->setAvgTempF((float) ($array['avgTempF'] ?? 0.0))
            ->setChanceofRain((float) ($array['changeOfRain'] ?? 0.0))
            ->setCondition((string) ($array['condition'] ?? ''))
            ->setDate((string) ($array['date'] ?? 'now'))
            ->setIconUri((string) ($array['iconUri'] ?? ''))
            ->setMaxTempC((float) ($array['maxTempC'] ?? ''))
            ->setMaxTempF((float) ($array['maxTempF'] ?? ''))
            ->setMinTempC((float) ($array['minTempC'] ?? ''))
            ->setMinTempF((float) ($array['minTempF'] ?? ''))
            ->setSunrise((string) ($array['sunrise'] ?? ''))
            ->setSunset((string) ($array['sunset'] ?? ''))
            ->setWillItRain((bool) ($array['willItRain'] ?? ''));

    }

    public function toArray(): array
    {
        return [
            'avgTempC' => $this->getAvgTempC(),
            'avgTempF' => $this->getAvgTempF(),
            'chanceOfRain' => $this->getChanceofRain(),
            'condition' => $this->getCondition(),
            'date' => $this->getDate()->format('Y-m-d'),
            'iconUri' => $this->getIconUri(),
            'maxTempC' => $this->getMaxTempC(),
            'maxTempF' => $this->getMaxTempF(),
            'minTempC' => $this->getMinTempC(),
            'minTempF' => $this->getMinTempF(),
            'sunrise' => $this->getSunrise(),
            'sunset' => $this->getSunset(),
            'willItRain' => $this->getWillItRain()
        ];
    }
}
