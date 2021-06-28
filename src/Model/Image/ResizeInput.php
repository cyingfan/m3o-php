<?php
declare(strict_types=1);

namespace M3O\Model\Image;


use M3O\Model\AbstractModel;

class ResizeInput extends ConvertInput
{
    private CropOptions $cropOptions;
    private int $height;
    private int $width;

    public function getCropOptions(): CropOptions
    {
        return $this->cropOptions;
    }

    public function setCropOptions(CropOptions $cropOptions): ResizeInput
    {
        $this->cropOptions = $cropOptions;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): ResizeInput
    {
        $this->height = $height;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): ResizeInput
    {
        $this->width = $width;
        return $this;
    }

    public static function fromArray(array $array): ResizeInput
    {
        return (new ResizeInput())
            ->setBase64((string)($array['base64'] ?? ''))
            ->setName((string)($array['name'] ?? ''))
            ->setOutputURL((bool)($array['outputURL'] ?? false))
            ->setUrl((string)($array['url'] ?? ''))
            ->setCropOptions($array['cropOptions'] ?? null)
            ->setHeight((int)($array['height'] ?? 0))
            ->setWidth((int)($array['width'] ?? 0));
    }

    public function toArray(): array
    {
        return parent::toArray() + [
                'cropOptions' => $this->getCropOptions(),
                'height' => $this->getHeight(),
                'width' => $this->getWidth()
            ];
    }
}