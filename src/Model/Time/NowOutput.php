<?php
declare(strict_types=1);

namespace M3O\Model\Time;


use M3O\Model\AbstractModel;

class NowOutput extends AbstractModel
{
    private string $localtime;
    private string $location;
    private string $timestamp;
    private string $timezone;
    private int $unix;

    public function getLocaltime(): string
    {
        return $this->localtime;
    }

    public function setLocaltime(string $localtime): NowOutput
    {
        $this->localtime = $localtime;
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

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): NowOutput
    {
        $this->timestamp = $timestamp;
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

    public function getUnix(): int
    {
        return $this->unix;
    }

    public function setUnix(int $unix): NowOutput
    {
        $this->unix = $unix;
        return $this;
    }

    public static function fromArray(array $array): NowOutput
    {
        return (new NowOutput())
            ->setLocaltime((string) ($array['localtime'] ?? ''))
            ->setLocation((string) ($array['location'] ?? ''))
            ->setTimestamp((string) ($array['timestamp'] ?? ''))
            ->setTimezone((string) ($array['timezone'] ?? ''))
            ->setUnix((int) ($array['unix'] ?? 0));
    }

    public function toArray(): array
    {
        return [
            'localtime' => $this->getLocaltime(),
            'location' => $this->getLocation(),
            'timestamp' => $this->getTimestamp(),
            'timezone' => $this->getTimezone(),
            'unix' => $this->getUnix()
        ];
    }
}
