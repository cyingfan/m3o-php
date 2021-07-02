<?php
declare(strict_types=1);

namespace M3O\Model\Sms;


use M3O\Model\AbstractModel;

class SendInput extends AbstractModel
{
    private string $from;
    private string $message;
    private string $to;

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): SendInput
    {
        $this->from = $from;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): SendInput
    {
        $this->message = $message;
        return $this;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): SendInput
    {
        $this->to = $to;
        return $this;
    }

    public static function fromArray(array $array): SendInput
    {
        return (new SendInput())
            ->setFrom((string) ($array['from'] ?? ''))
            ->setMessage((string) ($array['message'] ?? ''))
            ->setTo((string) ($array['to'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'from' => $this->getFrom(),
            'message' => $this->getMessage(),
            'to' => $this->getTo()
        ];
    }
}
