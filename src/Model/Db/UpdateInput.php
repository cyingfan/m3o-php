<?php
declare(strict_types=1);

namespace M3O\Model\Db;


use M3O\Model\ModelInterface;

class UpdateInput implements ModelInterface
{
    private string $id;
    private ?string $table;
    /** @var array<string, mixed> */
    private array $record;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): UpdateInput
    {
        $this->id = $id;
        return $this;
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function setTable(?string $table): UpdateInput
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
    public function setRecord(array $record): UpdateInput
    {
        $this->record = $record;
        return $this;
    }

    public static function fromArray(array $array): UpdateInput
    {
        return (new UpdateInput())
            ->setId((string) ($array['id'] ?? ''))
            ->setTable($array['table'] ?? null)
            ->setRecord((array) ($array['record'] ?? []));
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'table' => $this->getTable(),
            'record' => $this->getRecord()
        ]);
    }
}