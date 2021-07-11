<?php
declare(strict_types=1);

namespace M3O\Model\Weather;


use InvalidArgumentException;
use M3O\Model\AbstractModel;

class ForecastInput extends AbstractModel
{
    private int $days;
    private string $location;

    public function getDays(): int
    {
        return $this->days;
    }

    public function setDays(int $days = 1): ForecastInput
    {
        if ($days < 1 || $days > 10) {
            throw new InvalidArgumentException('Days must be between 1-10 inclusive.');
        }
        $this->days = $days;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): ForecastInput
    {
        $this->location = $location;
        return $this;
    }

    public static function fromArray(array $array): ForecastInput
    {
        return (new ForecastInput())
            ->setDays((int) ($array['days'] ?? 0))
            ->setLocation((string) ($array['location'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'days' => $this->getDays(),
            'location' => $this->getLocation()
        ];
    }
}
