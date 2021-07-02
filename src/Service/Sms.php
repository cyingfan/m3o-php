<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\ClientInterface;
use InvalidArgumentException;
use M3O\Model\Sms\SendInput;
use M3O\Model\Sms\SendOutput;
use M3O\Util\PhoneValidator;

class Sms extends AbstractService
{
    private PhoneValidator $phoneValidator;

    public function __construct(ClientInterface $client, PhoneValidator $phoneValidator)
    {
        parent::__construct($client);
        $this->phoneValidator = $phoneValidator;
    }

    public function getServiceName(): string
    {
        return 'sms';
    }

    public function send(SendInput $input): ?SendOutput
    {
        if (!$this->phoneValidator->validatePhone($input->getTo())) {
            throw new InvalidArgumentException('Invalid recipient phone number format.');
        }
        if (!$this->phoneValidator->validatePhone($input->getFrom())) {
            throw new InvalidArgumentException('Invalid sender phone number format.');
        }
        $response = $this->request('Send', $input->toArray());
        return $this->parseResponseAsModel($response, SendOutput::class);
    }
}
