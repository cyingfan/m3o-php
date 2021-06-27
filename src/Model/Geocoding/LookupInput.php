<?php
declare(strict_types=1);

namespace M3O\Model\Geocoding;


use M3O\Model\AbstractModel;

class LookupInput extends AbstractModel
{
    private string $address;
    private string $city;
    private string $country;
    private string $postcode;

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): LookupInput
    {
        $this->address = $address;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): LookupInput
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): LookupInput
    {
        $this->country = $country;
        return $this;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): LookupInput
    {
        $this->postcode = $postcode;
        return $this;
    }

    public static function fromArray(array $array): LookupInput
    {
        return (new LookupInput())
            ->setAddress((string) ($array['address'] ?? ''))
            ->setCity((string) ($array['city'] ?? ''))
            ->setCountry((string) ($array['country'] ?? ''))
            ->setPostcode((string) ($array['postcode'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'address' => $this->getAddress(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'postcide' => $this->getPostcode()
        ];
    }
}