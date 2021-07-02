<?php
declare(strict_types=1);

namespace M3O\Model\Email;


use M3O\Model\AbstractModel;

class SendInput extends AbstractModel
{
    private string $from;
    private string $htmlBody;
    private string $replyTo;
    private string $subject;
    private string $textBody;
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

    public function getHtmlBody(): string
    {
        return $this->htmlBody;
    }

    public function setHtmlBody(string $htmlBody): SendInput
    {
        $this->htmlBody = $htmlBody;
        return $this;
    }

    public function getReplyTo(): string
    {
        return $this->replyTo;
    }

    public function setReplyTo(string $replyTo): SendInput
    {
        $this->replyTo = $replyTo;
        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): SendInput
    {
        $this->subject = $subject;
        return $this;
    }

    public function getTextBody(): string
    {
        return $this->textBody;
    }

    public function setTextBody(string $textBody): SendInput
    {
        $this->textBody = $textBody;
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
            ->setHtmlBody((string) ($array['htmlBody'] ?? ''))
            ->setReplyTo((string) ($array['replyTo'] ?? ''))
            ->setSubject((string) ($array['subject'] ?? ''))
            ->setTextBody((string) ($array['textBody'] ?? ''))
            ->setTo((string) ($array['to'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'from' => $this->getFrom(),
            'htmlBody' => $this->getHtmlBody(),
            'replyTo' => $this->getReplyTo(),
            'subject' => $this->getSubject(),
            'textBody' => $this->getTextBody(),
            'to' => $this->getTo()
        ];
    }
}
