<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Otp\GenerateInput;
use M3O\Model\Otp\ValidateInput;

class Otp extends AbstractService
{
    public function getServiceName(): string
    {
        return 'otp';
    }

    /**
     * @throws GuzzleException
     */
    public function generate(GenerateInput $input): ?string
    {
        $response = $this->request('Generate', $input->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['code'] ?? null;
    }

    /**
     * @throws GuzzleException
     */
    public function validate(ValidateInput $input): bool
    {
        $response = $this->request('Validate', $input->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['success'] ?? false;
    }
}