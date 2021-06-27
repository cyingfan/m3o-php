<?php
declare(strict_types=1);

namespace M3O\Model\Geocoding;


use M3O\Model\AbstractModel;

class Address extends AbstractModel
{
    private string $city;
    private string $country;
    private string $lineOne;
    private string $lineTwo;
    private string $postcode;

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }

    public function getLineOne(): string
    {
        return $this->lineOne;
    }

    public function setLineOne(string $lineOne): Address
    {
        $this->lineOne = $lineOne;
        return $this;
    }

    public function getLineTwo(): string
    {
        return $this->lineTwo;
    }

    public function setLineTwo(string $lineTwo): Address
    {
        $this->lineTwo = $lineTwo;
        return $this;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): Address
    {
        $this->postcode = $postcode;
        return $this;
    }

    public static function fromArray(array $array): Address
    {
        return (new Address())
            ->setCity((string) ($array['city'] ?? ''))
            ->setCountry((string) ($array['country'] ?? ''))
            ->setLineOne((string) ($array['lineOne'] ?? ''))
            ->setLineTwo((string) ($array['lineTwo'] ?? ''))
            ->setPostcode((string) ($array['postcode'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'lineOne' => $this->getLineOne(),
            'lineTwo' => $this->getLineTwo(),
            'postcide' => $this->getPostcode()
        ];
    }
}