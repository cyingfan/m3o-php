<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Geocoding\Address;
use M3O\Model\Geocoding\Location;
use M3O\Model\Geocoding\LookupInput;
use M3O\Model\Geocoding\AddressLocation;

class Geocoding extends AbstractService
{
    public function getServiceName(): string
    {
        return 'geocoding';
    }

    /**
     * @throws GuzzleException
     */
    public function lookup(LookupInput $input): ?AddressLocation
    {
        $response = $this->request('Lookup', $input->toArray());
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return (new AddressLocation())
            ->setAddress(Address::fromArray($json['address'] ?? []))
            ->setLocation(Location::fromArray($json['location']));
    }

    /**
     * @throws GuzzleException
     */
    public function reverse(Location $location): ?AddressLocation
    {
        $response = $this->request('Reverse', $location->toArray());
        return $this->parseResponseAsModel($response, AddressLocation::class);
    }
}