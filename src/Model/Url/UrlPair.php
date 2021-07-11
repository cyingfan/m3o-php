<?php
declare(strict_types=1);

namespace M3O\Model\Url;


use M3O\Model\AbstractModel;

class UrlPair extends AbstractModel
{
    private float $created;
    private string $destinationURL;
    private int $hitCount;
    private string $owner;
    private string $shortURL;

    public function getCreated(): float
    {
        return $this->created;
    }

    public function setCreated(float $created): UrlPair
    {
        $this->created = $created;
        return $this;
    }

    public function getDestinationURL(): string
    {
        return $this->destinationURL;
    }

    public function setDestinationURL(string $destinationURL): UrlPair
    {
        $this->destinationURL = $destinationURL;
        return $this;
    }

    public function getHitCount(): int
    {
        return $this->hitCount;
    }

    public function setHitCount(int $hitCount): UrlPair
    {
        $this->hitCount = $hitCount;
        return $this;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): UrlPair
    {
        $this->owner = $owner;
        return $this;
    }

    public function getShortURL(): string
    {
        return $this->shortURL;
    }

    public function setShortURL(string $shortURL): UrlPair
    {
        $this->shortURL = $shortURL;
        return $this;
    }

    public static function fromArray(array $array): UrlPair
    {
        return (new UrlPair())
            ->setCreated((float) ($array['created'] ?? 0.0))
            ->setDestinationURL((string) ($array['destinationURL'] ?? ''))
            ->setHitCount((int) ($array['hitCount'] ?? 0))
            ->setOwner((string) ($array['owner'] ?? ''))
            ->setShortURL((string) ($array['shortURL']));
    }

    public function toArray(): array
    {
        return [
            'created' => $this->getCreated(),
            'destinationURL' => $this->getDestinationURL(),
            'hitCount' => $this->getHitCount(),
            'owner' => $this->getOwner(),
            'shortURL' => $this->getShortURL()
        ];
    }
}
