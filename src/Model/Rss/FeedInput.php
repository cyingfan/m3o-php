<?php
declare(strict_types=1);

namespace M3O\Model\Rss;


use M3O\Model\AbstractModel;

class FeedInput extends AbstractModel
{
    private int $limit;
    private string $name;
    private int $offset;

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): FeedInput
    {
        $this->limit = $limit;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): FeedInput
    {
        $this->name = $name;
        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): FeedInput
    {
        $this->offset = $offset;
        return $this;
    }

    public static function fromArray(array $array): FeedInput
    {
        return (new FeedInput())
            ->setLimit((int) ($array['limit'] ?? 0))
            ->setOffset((int) ($array['offset'] ?? 0))
            ->setName((string) ($array['name'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'limit' => $this->getLimit(),
            'name' => $this->getName(),
            'offset' => $this->getOffset()
        ];
    }
}