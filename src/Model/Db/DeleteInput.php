<?php
declare(strict_types=1);

namespace M3O\Model\Db;


use M3O\Model\AbstractModel;

class DeleteInput extends AbstractModel
{
    private string $id;
    private ?string $table;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): DeleteInput
    {
        $this->id = $id;
        return $this;
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function setTable(?string $table): DeleteInput
    {
        $this->table = $table;
        return $this;
    }

    public static function fromArray(array $array): DeleteInput
    {
        return (new DeleteInput())
            ->setTable($array['table'] ?? null)
            ->setId((string) ($array['id'] ?? ''));
    }

    public function toArray(): array
    {
        return array_filter([
            'table' => $this->getTable(),
            'id' => $this->getId()
        ]);
    }
}