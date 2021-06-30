<?php
declare(strict_types=1);

namespace M3O\Model\Otp;


use M3O\Model\AbstractModel;

class ValidateInput extends AbstractModel
{
    private string $code;
    private string $id;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): ValidateInput
    {
        $this->code = $code;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ValidateInput
    {
        $this->id = $id;
        return $this;
    }

    public static function fromArray(array $array): ValidateInput
    {
        return (new ValidateInput())
            ->setId((string) ($array['id'] ?? ''))
            ->setCode((string) ($array['code'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode()
        ];
    }
}