<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class HistoryInput extends AbstractModel
{
    private DateTimeInterface $date;
    private string $stock;

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return static
     * @throws Exception
     */
    public function setDate($date)
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function getStock(): string
    {
        return $this->stock;
    }

    /**
     * @param string $stock
     * @return static
     */
    public function setStock(string $stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): HistoryInput
    {
        return (new HistoryInput())
            ->setDate((string) ($array['date'] ?? 'now'))
            ->setStock((string) ($array['stock'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate()->format('Y-m-d'),
            'stock' => $this->getStock()
        ];
    }
}
