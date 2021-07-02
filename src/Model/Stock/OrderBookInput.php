<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;

class OrderBookInput extends HistoryInput
{
    private ?DateTimeInterface $end;
    private int $limit;
    private ?DateTimeInterface $start;

    public function getEnd(): ?DateTimeInterface
    {
        return $this->end;
    }

    /**
     * @param DateTimeInterface|string|null $end
     * @return static
     * @throws Exception
     */
    public function setEnd($end): OrderBookInput
    {
        if (is_string($end)) {
            $end = new DateTimeImmutable($end);
        }
        $this->end = $end;
        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): OrderBookInput
    {
        $this->limit = $limit;
        return $this;
    }

    public function getStart(): ?DateTimeInterface
    {
        return $this->start;
    }

    /**
     * @param DateTimeInterface|string|null $start
     * @return static
     * @throws Exception
     */
    public function setStart($start): OrderBookInput
    {
        if (is_string($start)) {
            $start = new DateTimeImmutable($start);
        }
        $this->start = $start;
        return $this;
    }

    public static function fromArray(array $array): OrderBookInput
    {
        return (new OrderBookInput())
            ->setDate((string) ($array['date'] ?? 'now'))
            ->setStock((string) ($array['stock'] ?? ''))
            ->setLimit((int) ($array['limit'] ?? 0))
            ->setEnd(($array['end'] ?? null))
            ->setStart(($array['start'] ?? null));
    }

    public function toArray(): array
    {
        return parent::toArray() + array_filter([
            'end' => $this->getEnd() ? $this->getEnd()->format(DateTimeInterface::RFC3339_EXTENDED) : null,
            'limit' => $this->getLimit(),
            'start' => $this->getStart() ? $this->getStart()->format(DateTimeInterface::RFC3339_EXTENDED) : null
        ]);
    }
}
