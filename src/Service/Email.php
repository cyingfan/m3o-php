<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Email\SendInput;

class Email extends AbstractService
{
    public function getServiceName(): string
    {
        return 'email';
    }

    /**
     * @throws GuzzleException
     */
    public function send(SendInput $input): bool
    {
        $response = $this->request('send', $input->toArray());
        return $response->getStatusCode() === 200;
    }
}
