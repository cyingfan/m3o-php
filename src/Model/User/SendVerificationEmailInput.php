<?php
declare(strict_types=1);

namespace M3O\Model\User;


use M3O\Model\AbstractModel;

class SendVerificationEmailInput extends AbstractModel
{
    private string $email;
    private string $failureRedirectUrl;
    private string $fromName;
    private string $redirectUrl;
    private string $subject;
    private string $textContent;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): SendVerificationEmailInput
    {
        $this->email = $email;
        return $this;
    }

    public function getFailureRedirectUrl(): string
    {
        return $this->failureRedirectUrl;
    }

    public function setFailureRedirectUrl(string $failureRedirectUrl): SendVerificationEmailInput
    {
        $this->failureRedirectUrl = $failureRedirectUrl;
        return $this;
    }

    public function getFromName(): string
    {
        return $this->fromName;
    }

    public function setFromName(string $fromName): SendVerificationEmailInput
    {
        $this->fromName = $fromName;
        return $this;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(string $redirectUrl): SendVerificationEmailInput
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): SendVerificationEmailInput
    {
        $this->subject = $subject;
        return $this;
    }

    public function getTextContent(): string
    {
        return $this->textContent;
    }

    public function setTextContent(string $textContent): SendVerificationEmailInput
    {
        $this->textContent = $textContent;
        return $this;
    }

    public static function fromArray(array $array): SendVerificationEmailInput
    {
        return (new SendVerificationEmailInput())
            ->setEmail((string) ($array['email'] ?? ''))
            ->setFailureRedirectUrl((string) ($array['failureRedirectUrl'] ?? ''))
            ->setFromName((string) ($array['fromName'] ?? ''))
            ->setRedirectUrl((string) ($array['redirectUrl'] ?? ''))
            ->setSubject((string) ($array['subject'] ?? ''))
            ->setTextContent((string) ($array['textContent'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'failureRedirectUrl' => $this->getFailureRedirectUrl(),
            'fromName' => $this->getFromName(),
            'redirectUrl' => $this->getRedirectUrl(),
            'subject' => $this->getSubject(),
            'textContent' => $this->getTextContent()
        ];
    }
}
