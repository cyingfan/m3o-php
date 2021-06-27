<?php
declare(strict_types=1);

namespace M3O\Model\Currency;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class HistoryInput extends AbstractModel
{
    private string $code;
    private DateTimeInterface $date;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return static
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return static
     * @throws Exception
     */
    public function setDate($date): HistoryInput
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): HistoryInput
    {
        return (new HistoryInput())
            ->setCode((string) ($array['code'] ?? ''))
            ->setDate($array['date'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'code' => $this->getCode(),
            'date' => $this->getDate()
        ];
    }
}