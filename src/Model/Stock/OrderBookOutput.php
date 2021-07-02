<?php
declare(strict_types=1);

namespace M3O\Model\Stock;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class OrderBookOutput extends AbstractModel
{
    private DateTimeInterface $date;
    /** @var Order[]  */
    private array $orders;
    private string $symbol;

    /**
     * @return DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|string $date
     * @return OrderBookOutput
     * @throws Exception
     */
    public function setDate($date): OrderBookOutput
    {
        if (is_string($date)) {
            $date = new DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    /**
     * @return Order[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param Order[] $orders
     * @return $this
     */
    public function setOrders(array $orders): OrderBookOutput
    {
        $this->orders = $this->castModelArray($orders, Order::class);
        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): OrderBookOutput
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): OrderBookOutput
    {
        return (new OrderBookOutput())
            ->setDate($array['date'] ?? 'now')
            ->setOrders((array) ($array['orders'] ?? []))
            ->setSymbol((string) ($array['symbol'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate()->format('Y-m-d'),
            'orders' => array_map(
                fn(Order $order) => $order->toArray(),
                $this->getOrders()
            ),
            'symbol' => $this->getSymbol()
        ];
    }
}
