<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\User\CreateInput;
use M3O\Model\User\Account;
use M3O\Model\User\LoginInput;
use M3O\Model\User\ReadInput;
use M3O\Model\User\SendVerificationEmailInput;
use M3O\Model\User\Session;
use M3O\Model\User\UpdateInput;
use M3O\Model\User\UpdatePasswordInput;

class User extends AbstractService
{
    public function getServiceName(): string
    {
        return 'user';
    }

    /**
     * @throws GuzzleException
     */
    public function create(CreateInput $input): ?Account
    {
        $response = $this->request('Create', $input->toArray());
        return $this->parseResponseAsModel($response, Account::class, 'account');
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $id): bool
    {
        $response = $this->request('Delete', ['id' => $id]);
        return $response->getStatusCode() === 200;
    }

    /**
     * @throws GuzzleException
     */
    public function login(LoginInput $input): ?Session
    {
        $response = $this->request('Login', $input->toArray());
        return $this->parseResponseAsModel($response, Session::class, 'session');
    }

    /**
     * @throws GuzzleException
     */
    public function read(ReadInput $input): ?Account
    {
        $response = $this->request('Read', $input->toArray());
        return $this->parseResponseAsModel($response, Account::class, 'account');
    }

    /**
     * @throws GuzzleException
     */
    public function readSession(string $sessionId): ?Session
    {
        $response = $this->request('ReadSession', ['sessionId' => $sessionId]);
        return $this->parseResponseAsModel($response, Session::class, 'session');
    }

    /**
     * @throws GuzzleException
     */
    public function sendVerificationEmail(SendVerificationEmailInput $input): bool
    {
        $response = $this->request('SendVerificationEmail', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @throws GuzzleException
     */
    public function update(UpdateInput $input): bool
    {
        $response = $this->request('Update', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @throws GuzzleException
     */
    public function updatePassword(UpdatePasswordInput $input): bool
    {
        $response = $this->request('UpdatePassword', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @throws GuzzleException
     */
    public function verifyEmail(string $token): bool
    {
        $response = $this->request('VerifyEmail', ['token' => $token]);
        return $response->getStatusCode() === 200;
    }
}
