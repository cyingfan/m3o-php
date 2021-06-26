<?php


namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Db\CreateInput;
use M3O\Model\Db\DeleteInput;
use M3O\Model\Db\ReadInput;
use M3O\Model\Db\UpdateInput;

class Db extends AbstractService
{
    public function getServiceName(): string
    {
        return 'db';
    }

    /**
     * @throws GuzzleException
     */
    public function create(CreateInput $input): ?string
    {
        $response = $this->request('Create', $input->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['id'] ?? null;
    }

    public function delete(DeleteInput $input): bool
    {
        $response = $this->request('Delete', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @param ReadInput $input
     * @return array<string, mixed>[]
     * @throws GuzzleException
     */
    public function read(ReadInput $input): array
    {
        $response = $this->request('Read', $input->toArray());
        return $this->parseResponseAsArray($response);
    }

    /**
     * @throws GuzzleException
     */
    public function truncate(?string $table): bool
    {
        $response = $this->request(
            'Truncate',
            array_filter(['table' => $table])
        );
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
}