<?php
declare(strict_types=1);

namespace M3O\Model\Sms;


use M3O\Model\AbstractModel;

class SendOutput extends AbstractModel
{
    private string $info;
    private string $status;

    public function getInfo(): string
    {
        return $this->info;
    }

    public function setInfo(string $info): SendOutput
    {
        $this->info = $info;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): SendOutput
    {
        $this->status = $status;
        return $this;
    }

    public static function fromArray(array $array): SendOutput
    {
        return (new SendOutput())
            ->setInfo((string) ($array['info'] ?? ''))
            ->setStatus((string) ($array['status'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'info' => $this->getInfo(),
            'status' => $this->getStatus()
        ];
    }
}
