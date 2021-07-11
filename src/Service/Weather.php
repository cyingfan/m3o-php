<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Weather\ForecastInput;
use M3O\Model\Weather\ForecastOutput;
use M3O\Model\Weather\NowOutput;

class Weather extends AbstractService
{
    public function getServiceName(): string
    {
        return 'weather';
    }

    /**
     * @throws GuzzleException
     */
    public function forecast(ForecastInput  $input):? ForecastOutput
    {
        $response = $this->request('Forecast', $input->toArray());
        return $this->parseResponseAsModel($response, ForecastOutput::class);
    }

    public function now(string $location): ?NowOutput
    {
        $response = $this->request('Now', ['location' => $location]);
        return $this->parseResponseAsModel($response, NowOutput::class);
    }
}
