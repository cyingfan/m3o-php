<?php
declare(strict_types=1);

namespace M3O\Model\User;


class Account extends CreateInput
{
    private float $created;
    private float $updated;
    private float $verificationDate;
    private bool $verified;

    public function getCreated(): float
    {
        return $this->created;
    }

    public function setCreated(float $created): Account
    {
        $this->created = $created;
        return $this;
    }

    public function getUpdated(): float
    {
        return $this->updated;
    }

    public function setUpdated(float $updated): Account
    {
        $this->updated = $updated;
        return $this;
    }

    public function getVerificationDate(): float
    {
        return $this->verificationDate;
    }

    public function setVerificationDate(float $verificationDate): Account
    {
        $this->verificationDate = $verificationDate;
        return $this;
    }

    public function getVerified(): bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): Account
    {
        $this->verified = $verified;
        return $this;
    }

    public static function fromArray(array $array): Account
    {
        return (new Account())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setId((string) ($array['id'] ?? ''))
            ->setPassword((string) ($array['password'] ?? ''))
            ->setUsername((string) ($array['username'] ?? ''))
            ->setProfile((array) ($array['username'] ?? []))
            ->setCreated((float) ($array['created'] ?? 0.0))
            ->setUpdated((float) ($array['updated'] ?? 0.0))
            ->setVerificationDate((float) ($array['verificationDate'] ?? 0.0))
            ->setVerified((bool) ($array['verified'] ?? false));
    }
}
