<?php
declare(strict_types=1);

namespace M3O\Model\Routing;


use M3O\Model\AbstractModel;

class Maneuver extends AbstractModel
{
    private string $action;
    private int $bearingAfter;
    private int $bearingBefore;
    private string $direction;
    private Location $location;

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): Maneuver
    {
        $this->action = $action;
        return $this;
    }

    public function getBearingAfter(): int
    {
        return $this->bearingAfter;
    }

    public function setBearingAfter(int $bearingAfter): Maneuver
    {
        $this->bearingAfter = $bearingAfter;
        return $this;
    }

    public function getBearingBefore(): int
    {
        return $this->bearingBefore;
    }

    public function setBearingBefore(int $bearingBefore): Maneuver
    {
        $this->bearingBefore = $bearingBefore;
        return $this;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): Maneuver
    {
        $this->direction = $direction;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|array<string, mixed> $location
     * @return Maneuver
     */
    public function setLocation($location): Maneuver
    {
        if (is_array($location)) {
            $location = Location::fromArray($location);
        }
        $this->location = $location;
        return $this;
    }

    public static function fromArray(array $array): Maneuver
    {
        return (new Maneuver())
            ->setAction((string) ($array['action'] ?? ''))
            ->setBearingAfter((int) ($array['bearingAfter'] ?? 0))
            ->setBearingBefore((int) ($array['bearingBefore'] ?? 0))
            ->setDirection((string) ($array['direction'] ?? ''))
            ->setLocation($array['location'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'action' => $this->getAction(),
            'bearingAfter' => $this->getBearingAfter(),
            'bearingBefore' => $this->getBearingBefore(),
            'direction' => $this->getDirection(),
            'location' => $this->getLocation()->toArray()
        ];
    }
}