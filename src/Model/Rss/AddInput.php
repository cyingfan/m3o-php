<?php
declare(strict_types=1);

namespace M3O\Model\Rss;


use M3O\Model\AbstractModel;

class AddInput extends AbstractModel
{
    private string $category;
    private string $name;
    private string $url;

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): AddInput
    {
        $this->category = $category;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AddInput
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): AddInput
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): AddInput
    {
        return (new AddInput())
            ->setCategory((string) ($array['category'] ?? ''))
            ->setName((string) ($array['name'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'category' => $this->getCategory(),
            'name' => $this->getName(),
            'url' => $this->getUrl()
        ];
    }
}