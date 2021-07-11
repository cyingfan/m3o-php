<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class UpdateInput extends AbstractModel
{
    private string $email;
    private string $id;
    /** @var array<string, string> */
    private array $profile;
    private string $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): UpdateInput
    {
        $this->email = $email;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

   public function setId(string $id): UpdateInput
    {
        $this->id = $id;
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
     * @return UpdateInput
     */
    public function setProfile(array $profile): UpdateInput
    {
        $this->profile = $profile;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): UpdateInput
    {
        $this->username = $username;
        return $this;
    }

    public static function fromArray(array $array): UpdateInput
    {
        return (new UpdateInput())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setUsername((string) ($array['username'] ?? ''))
            ->setProfile((array) ($array['profile'] ?? []));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'profile' => $this->getProfile()
        ];
    }
}
