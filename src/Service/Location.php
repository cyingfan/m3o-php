<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Location\Entity;
use M3O\Model\Location\Location as LocationModel;
use M3O\Model\Location\SearchInput;

class Location extends AbstractService
{
    public function getServiceName(): string
    {
        return 'location';
    }

    /**
     * @throws GuzzleException
     */
    public function read(string $id): ?Entity
    {
        $response = $this->request('Read', ['id' => $id]);
        return $this->parseResponseAsModel($response, Entity::class);
    }

    /**
     * @throws GuzzleException
     */
    public function save(Entity $entity): bool
    {
        $response = $this->request('Save', ['entity' => $entity->toArray()]);
        return $response->getStatusCode() !== 200;
    }

    /**
     * @param SearchInput $input
     * @return Entity[]
     * @throws GuzzleException
     */
    public function search(SearchInput $input): array
    {
        $response = $this->request('Search', $input->toArray());
        return $this->parseResponseAsModels($response, Entity::class, 'entities');
    }
}