<?php
declare(strict_types=1);

namespace M3O\Model\Image;


use M3O\Model\AbstractModel;

class UploadInput extends AbstractModel
{
    private string $base64;
    private string $name;
    private string $url;

    public function getBase64(): string
    {
        return $this->base64;
    }

    /**
     * @param string $base64
     * @return static
     */
    public function setBase64(string $base64)
    {
        $this->base64 = $base64;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): UploadInput
    {
        return (new UploadInput())
            ->setBase64((string) ($array['base64'] ?? ''))
            ->setName((string) ($array['name'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'base64' => $this->getBase64(),
            'name' => $this->getName(),
            'url' => $this->getUrl()
        ];
    }
}