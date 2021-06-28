<?php
declare(strict_types=1);

namespace M3O\Model\Image;


use M3O\Model\AbstractModel;

class ConvertInput extends UploadInput
{
    private bool $outputURL;

    public function getOutputURL(): bool
    {
        return $this->outputURL;
    }

    /**
     * @param bool $outputURL
     * @return static
     */
    public function setOutputURL(bool $outputURL)
    {
        $this->outputURL = $outputURL;
        return $this;
    }

    public static function fromArray(array $array): ConvertInput
    {
        return (new ConvertInput())
            ->setBase64((string) ($array['base64'] ?? ''))
            ->setName((string) ($array['name'] ?? ''))
            ->setOutputURL((bool) ($array['outputURL'] ?? false))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return parent::toArray() + ['outputURL' => $this->getOutputURL()];
    }
}