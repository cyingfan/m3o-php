<?php
declare(strict_types=1);

namespace M3O\Model\Rss;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class Entry extends AbstractModel
{
    private string $content;
    private DateTimeInterface $date;
    private string $feed;
    private string $id;
    private string $link;
    private string $summary;
    private string $title;

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Entry
    {
        $this->content = $content;
        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return Entry
     * @throws Exception
     */
    public function setDate($date): Entry
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function getFeed(): string
    {
        return $this->feed;
    }

    public function setFeed(string $feed): Entry
    {
        $this->feed = $feed;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Entry
    {
        $this->id = $id;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): Entry
    {
        $this->link = $link;
        return $this;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): Entry
    {
        $this->summary = $summary;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Entry
    {
        $this->title = $title;
        return $this;
    }

    public static function fromArray(array $array): Entry
    {
        return (new Entry())
            ->setContent((string) ($array['content'] ?? ''))
            ->setFeed((string) ($array['feed'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setLink((string) ($array['link'] ?? ''))
            ->setSummary((string) ($array['summary'] ?? ''))
            ->setTitle((string) ($array['title'] ?? ''))
            ->setDate($array['date'] ?? 'now');
    }

    public function toArray(): array
    {
        return [
            'content' => $this->getContent(),
            'date' => $this->getDate()->format('Y-m-d'),
            'feed' => $this->getFeed(),
            'id' => $this->getId(),
            'link' => $this->getLink(),
            'summary' => $this->getSummary(),
            'title' => $this->getTitle()
        ];
    }
}