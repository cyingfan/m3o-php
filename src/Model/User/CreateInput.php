<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class CreateInput extends AbstractModel
{
    private string $email;
    private string $id;
    private string $password;
    /** @var array<string, string> */
    private array $profile;
    private string $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return static
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return static
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getProfile(): array
    {
        return $this->profile;
    }

    /**
     * @param string[] $profile
     * @return static
     */
    public function setProfile(array $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return static
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    public static function fromArray(array $array): CreateInput
    {
        return (new CreateInput())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setPassword((string) ($array['password'] ?? ''))
            ->setUsername((string) ($array['username'] ?? ''))
            ->setProfile((array) ($array['username'] ?? []));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'id' => $this->getId(),
            'password' => $this->getPassword(),
            'profile' => $this->getProfile(),
            'username' => $this->getUsername()
        ];
    }
}
