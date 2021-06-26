<?php
declare(strict_types=1);

namespace M3O\Model\Db;


use M3O\Model\ModelInterface;

class CreateInput implements ModelInterface
{
    private ?string $table;
    /** @var array<string, mixed> */
    private array $record;

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function setTable(?string $table): CreateInput
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getRecord(): array
    {
        return $this->record;
    }

    /**
     * @param array<string, mixed> $record
     * @return $this
     */
    public function setRecord(array $record): CreateInput
    {
        $this->record = $record;
        return $this;
    }

    public static function fromArray(array $array): CreateInput
    {
        return (new CreateInput())
            ->setTable($array['table'] ?? null)
            ->setRecord((array) ($array['record'] ?? []));
    }

    public function toArray(): array
    {
        return array_filter([
            'table' => $this->getTable(),
            'record' => $this->getRecord()
        ]);
    }
}