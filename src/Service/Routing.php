<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Routing\DestinationOrigin;
use M3O\Model\Routing\DirectionsOutput;
use M3O\Model\Routing\RouteOutput;

class Routing extends AbstractService
{
    public function getServiceName(): string
    {
        return 'routing';
    }

    /**
     * @throws GuzzleException
     */
    public function directions(DestinationOrigin $destinationOrigin): ?DirectionsOutput
    {
        $response = $this->request('Directions', $destinationOrigin->toArray());
        return $this->parseResponseAsModel($response, DirectionsOutput::class);
    }

    /**
     * @throws GuzzleException
     */
    public function eta(DestinationOrigin $destinationOrigin): ?int
    {
        $response = $this->request('Eta', $destinationOrigin->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['duration'] ?? null;
    }

    /**
     * @throws GuzzleException
     */
    public function route(DestinationOrigin $destinationOrigin): ?RouteOutput
    {
        $response = $this->request('Route', $destinationOrigin->toArray());
        return $this->parseResponseAsModel($response, RouteOutput::class);
    }
}