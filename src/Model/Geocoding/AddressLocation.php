<?php
declare(strict_types=1);

namespace M3O\Model\Geocoding;


use M3O\Model\AbstractModel;

class AddressLocation extends AbstractModel
{
    private Address $address;
    private Location $location;

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): AddressLocation
    {
        $this->address = $address;
        return $this;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): AddressLocation
    {
        $this->location = $location;
        return $this;
    }

    public static function fromArray(array $array): AddressLocation
    {
        return (new AddressLocation())
            ->setAddress($array['address'] ?? null)
            ->setLocation($array['location'] ?? null);
    }

    public function toArray(): array
    {
        return [
            'address' => $this->getAddress()->toArray(),
            'location' => $this->getLocation()->toArray()
        ];
    }
}