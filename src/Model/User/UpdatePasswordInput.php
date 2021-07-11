<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class UpdatePasswordInput extends AbstractModel
{
    private string $confirmPassword;
    private string $newPassword;
    private string $oldPassword;
    private string $userId;

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): UpdatePasswordInput
    {
        $this->confirmPassword = $confirmPassword;
        return $this;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): UpdatePasswordInput
    {
        $this->newPassword = $newPassword;
        return $this;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): UpdatePasswordInput
    {
        $this->oldPassword = $oldPassword;
        return $this;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): UpdatePasswordInput
    {
        $this->userId = $userId;
        return $this;
    }

    public static function fromArray(array $array): UpdatePasswordInput
    {
        return (new UpdatePasswordInput())
            ->setConfirmPassword((string) ($array['confirmPassword'] ?? ''))
            ->setNewPassword((string) ($array['newPassword'] ?? ''))
            ->setOldPassword((string) ($array['oldPassword'] ?? ''))
            ->setUserId((string) ($array['userId'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'confirmPassword' => $this->getConfirmPassword(),
            'newPassword' => $this->getNewPassword(),
            'oldPassword' => $this->getOldPassword(),
            'userId' => $this->getUserId()
        ];
    }
}
