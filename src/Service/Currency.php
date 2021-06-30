<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Currency\Code;
use M3O\Model\Currency\ConvertInput;
use M3O\Model\Currency\ConvertOutput;
use M3O\Model\Currency\HistoryInput;
use M3O\Model\Currency\HistoryOutput;
use M3O\Model\Currency\Rates;

class Currency extends AbstractService
{
    /**
     * @return Code[]
     * @throws GuzzleException
     */
    public function codes(): array
    {
        $response = $this->request('Codes', []);
        return $this->parseResponseAsModels($response, Code::class, 'codes');
    }

    /**
     * @param ConvertInput $input
     * @return ?ConvertOutput
     * @throws GuzzleException
     */
    public function convert(ConvertInput $input): ?ConvertOutput
    {
        $response = $this->request('Convert', $input->toArray());
        return $this->parseResponseAsModel($response, ConvertOutput::class);
    }

    /**
     * @param HistoryInput $input
     * @return ?HistoryOutput
     * @throws GuzzleException
     */
    public function history(HistoryInput $input): ?HistoryOutput
    {
        $response = $this->request('History', $input->toArray());
        return $this->parseResponseAsModel($response, HistoryOutput::class);
    }

    /**
     * @param string $code
     * @return ?Rates
     * @throws GuzzleException
     */
    public function rates(string $code): ?Rates
    {
        $response = $this->request('Rates', ['code' => $code]);
        return $this->parseResponseAsModel($response, Rates::class);
    }

    public function getServiceName(): string
    {
        return 'currency';
    }
}