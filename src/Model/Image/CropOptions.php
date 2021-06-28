<?php
declare(strict_types=1);

namespace M3O\Model\Image;


use InvalidArgumentException;
use M3O\Model\AbstractModel;

class CropOptions extends AbstractModel
{
    public const ANCHOR_TOP = 'top';
    public const ANCHOR_TOP_LEFT = 'top left';
    public const ANCHOR_TOP_RIGHT = 'top right';
    public const ANCHOR_LEFT = 'left';
    public const ANCHOR_CENTER = 'center';
    public const ANCHOR_RIGHT = 'right';
    public const ANCHOR_BOTTOM_LEFT = 'bottom left';
    public const ANCHOR_BOTTOM = 'bottom';
    public const ANCHOR_BOTTOM_RIGHT = 'bottom right';
    public const ANCHORS = [
        self::ANCHOR_LEFT,
        self::ANCHOR_TOP_LEFT,
        self::ANCHOR_TOP_RIGHT,
        self::ANCHOR_LEFT,
        self::ANCHOR_CENTER,
        self::ANCHOR_RIGHT,
        self::ANCHOR_BOTTOM_LEFT,
        self::ANCHOR_BOTTOM,
        self::ANCHOR_BOTTOM_RIGHT
    ];

    private string $anchor;
    private int $width;
    private int $height;

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): CropOptions
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): CropOptions
    {
        $this->height = $height;
        return $this;
    }

    public function getAnchor(): string
    {
        return $this->anchor;
    }

    public function setAnchor(string $anchor): CropOptions
    {
        if (!in_array(strtolower(trim($anchor)), self::ANCHORS, true)) {
            throw new InvalidArgumentException('Invalid anchor');
        }
        $this->anchor = $anchor;
        return $this;
    }

    public static function fromArray(array $array): CropOptions
    {
        return (new CropOptions())
            ->setAnchor((string) ($array['anchor'] ?? self::ANCHOR_CENTER))
            ->setWidth((int) ($array['width'] ?? 0))
            ->setHeight((int) ($array['height'] ?? 0));
    }

    public function toArray(): array
    {
        return [
            'anchor' => $this->getAnchor(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight()
        ];
    }

}