<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Time\NowOutput;
use M3O\Model\Time\ZoneOutput;

class Time extends AbstractService
{
    public function getServiceName(): string
    {
        return 'time';
    }

    /**
     * @throws GuzzleException
     */
    public function now(?string $location): ?NowOutput
    {
        $response = $this->request('Now', ['location' => $location]);
        return $this->parseResponseAsModel($response, NowOutput::class);
    }

    /**
     * @throws GuzzleException
     */
    public function zone(string $location): ?ZoneOutput
    {
        $response = $this->request('Zone', ['location' => $location]);
        return $this->parseResponseAsModel($response, ZoneOutput::class);
    }
}
