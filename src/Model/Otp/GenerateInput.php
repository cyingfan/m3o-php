<?php
declare(strict_types=1);

namespace M3O\Model\Otp;


use M3O\Model\AbstractModel;

class GenerateInput extends AbstractModel
{
    private int $expiry = 60;
    private string $id;
    private int $size = 6;

    public function getExpiry(): int
    {
        return $this->expiry;
    }

    public function setExpiry(int $expiry): GenerateInput
    {
        $this->expiry = $expiry;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): GenerateInput
    {
        $this->id = $id;
        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): GenerateInput
    {
        $this->size = $size;
        return $this;
    }

    public static function fromArray(array $array): GenerateInput
    {
        return (new GenerateInput())
            ->setExpiry((int) ($array['expiry'] ?? 60))
            ->setId((string) ($array['id'] ?? ''))
            ->setSize((int) ($array['size'] ?? 6));
    }

    public function toArray(): array
    {
        return [
            'expiry' => $this->getExpiry(),
            'id' => $this->getId(),
            'size' => $this->getSize()
        ];
    }
}