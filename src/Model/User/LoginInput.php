<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class LoginInput extends AbstractModel
{
    private string $email;
    private string $password;
    private string $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): LoginInput
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): LoginInput
    {
        $this->password = $password;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): LoginInput
    {
        $this->username = $username;
        return $this;
    }

    public static function fromArray(array $array): LoginInput
    {
        return (new LoginInput())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setPassword((string) ($array['password'] ?? ''))
            ->setUsername((string) ($array['username'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'username' => $this->getUsername()
        ];
    }
}
