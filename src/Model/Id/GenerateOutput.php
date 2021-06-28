<?php
declare(strict_types=1);

namespace M3O\Model\Id;


use M3O\Model\AbstractModel;

class GenerateOutput extends AbstractModel
{
    private string $id;
    private string $type;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): GenerateOutput
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): GenerateOutput
    {
        $this->type = $type;
        return $this;
    }

    public static function fromArray(array $array): GenerateOutput
    {
        return (new GenerateOutput())
            ->setId((string) ($array['id'] ?? ''))
            ->setType((string) ($array['type'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType()
        ];
    }
}