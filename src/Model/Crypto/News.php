<?php
declare(strict_types=1);

namespace M3O\Model\Crypto;


use M3O\Model\ModelInterface;

class News implements ModelInterface
{
    /** @var Article[] */
    private array $articles;
    private string $symbol;

    /**
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param Article[] $articles
     */
    public function setArticles(array $articles): News
    {
        $this->articles = $articles;
        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): News
    {
        $this->symbol = $symbol;
        return $this;
    }

    public static function fromArray(array $array): News
    {
        return (new self())
            ->setArticles((array) ($array['articles'] ?? []))
            ->setSymbol((string) ($array['symbol']) ?? '');
    }

    public function toArray(): array
    {
        return [
            'articles' => $this->getArticles(),
            'symbol' => $this->getSymbol()
        ];
    }
}