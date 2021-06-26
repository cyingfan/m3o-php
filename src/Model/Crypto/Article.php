<?php
declare(strict_types=1);

namespace M3O\Model\Crypto;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\ModelInterface;

class Article implements ModelInterface
{
    private DateTimeInterface $date;
    private string $description;
    private string $source;
    private string $title;
    private string $url;

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @throws Exception
     */
    public function setDate($date): Article
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Article
    {
        $this->description = $description;
        return $this;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): Article
    {
        $this->source = $source;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Article
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): Article
    {
        return (new self())
            ->setDate($array['date'] ?? 'now')
            ->setDescription((string) ($array['description'] ?? ''))
            ->setSource((string) ($array['source'] ?? ''))
            ->setTitle((string) ($array['title'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate(),
            'description' => $this->getDescription(),
            'source' => $this->getSource(),
            'title' => $this->getTitle(),
            'url' => $this->getUrl()
        ];
    }

}