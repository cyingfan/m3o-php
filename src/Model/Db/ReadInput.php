<?php


namespace M3O\Model\Db;


use InvalidArgumentException;
use M3O\Model\AbstractModel;

class ReadInput extends AbstractModel
{
    public const ORDER_ASC = 'asc';
    public const ORDER_DESC = 'desc';

    private ?string $id;
    private ?int $limit;
    private ?int $offset;
    private ?string $order;
    private ?string $orderBy;
    private ?string $query;
    private ?string $table;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): ReadInput
    {
        $this->id = $id;
        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): ReadInput
    {
        if ($limit > 1000 || $limit < 1) {
            throw new InvalidArgumentException('Limit must be 1-1000 inclusive.');
        }
        $this->limit = $limit;
        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): ReadInput
    {
        $this->offset = $offset;
        return $this;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): ReadInput
    {
        if (is_string($order) && $order !== self::ORDER_ASC && $order !== self::ORDER_DESC) {
            throw new InvalidArgumentException('Order must be "asc" or "desc".');
        }
        $this->order = $order;
        return $this;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function setOrderBy(?string $orderBy): ReadInput
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(?string $query): ReadInput
    {
        $this->query = $query;
        return $this;
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function setTable(?string $table): ReadInput
    {
        $this->table = $table;
        return $this;
    }

    public static function fromArray(array $array): ReadInput
    {
        return (new ReadInput())
            ->setId($array['id'] ?? null)
            ->setLimit($array['limit'] ?? null)
            ->setOffset($array['offset'] ?? null)
            ->setOrder($array['order'] ?? null)
            ->setOrderBy($array['orderBy'] ?? null)
            ->setQuery($array['query'] ?? null)
            ->setTable($array['table'] ?? null);
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'limit' => $this->getLimit(),
            'offset' => $this->getOffset(),
            'order' => $this->getOrder(),
            'orderBy' => $this->getOrderBy(),
            'query' => $this->getQuery(),
            'table' => $this->getTable()
        ]);
    }
}