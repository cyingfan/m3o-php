<?php
declare(strict_types=1);

namespace M3O\Model\Rss;


use M3O\Model\AbstractModel;

class Feed extends AbstractModel
{
    private string $category;
    private string $id;
    private string $name;
    private string $url;

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): Feed
    {
        $this->category = $category;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Feed
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Feed
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Feed
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): Feed
    {
        return (new Feed())
            ->setCategory((string) ($array['category'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setName((string) ($array['name'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'category' => $this->getCategory(),
            'id' => $this->getId(),
            'name' => $this->getName(),
            'url' => $this->getUrl()
        ];
    }
}