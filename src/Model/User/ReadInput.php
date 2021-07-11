<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class ReadInput extends AbstractModel
{
    private string $email;
    private string $id;
    private string $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): ReadInput
    {
        $this->email = $email;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ReadInput
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): ReadInput
    {
        $this->username = $username;
        return $this;
    }

    public static function fromArray(array $array): ReadInput
    {
        return (new ReadInput())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setUsername((string) ($array['username'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'id' => $this->getId(),
            'username' => $this->getUsername()
        ];
    }

}
