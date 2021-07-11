<?php
declare(strict_types=1);

namespace M3O\Model\Thumbnail;


use M3O\Model\AbstractModel;

class ScreenshotInput extends AbstractModel
{
    private ?int $height;
    private string $url;
    private ?int $width;

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): ScreenshotInput
    {
        $this->height = $height;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): ScreenshotInput
    {
        $this->url = $url;
        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): ScreenshotInput
    {
        $this->width = $width;
        return $this;
    }

    public static function fromArray(array $array): ScreenshotInput
    {
        return (new ScreenshotInput())
            ->setHeight($array['height'] ?? null)
            ->setWidth($array['width'] ?? null)
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return array_filter([
            'height' => $this->getHeight(),
            'url' => $this->getUrl(),
            'width' => $this->getWidth()
        ]);
    }
}
