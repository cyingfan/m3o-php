<?php
declare(strict_types=1);

namespace M3O\Model\Image;


use M3O\Model\AbstractModel;

class Output extends AbstractModel
{
    private string $base64;
    private string $url;

    public function getBase64(): string
    {
        return $this->base64;
    }

    public function setBase64(string $base64): Output
    {
        $this->base64 = $base64;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Output
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): Output
    {
        return (new Output())
            ->setBase64((string) ($array['base64'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'base64' => $this->getBase64(),
            'url' => $this->getUrl()
        ];
    }
}