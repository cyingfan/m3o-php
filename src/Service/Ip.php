<?php
declare(strict_types=1);

namespace M3O\Service;


use M3O\Model\Ip\LookupOutput;

class Ip extends AbstractService
{
    public function getServiceName(): string
    {
        return 'ip';
    }

    public function lookup(string $ip): ?LookupOutput
    {
        $response = $this->request('Lookup', ['ip' => $ip]);
        return $this->parseResponseAsModel($response, LookupOutput::class);
    }
}