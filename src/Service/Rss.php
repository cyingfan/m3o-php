<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Rss\AddInput;
use M3O\Model\Rss\Entry;
use M3O\Model\Rss\Feed;
use M3O\Model\Rss\FeedInput;

class Rss extends AbstractService
{
    public function getServiceName(): string
    {
        return 'rss';
    }

    /**
     * @throws GuzzleException
     */
    public function add(AddInput $input): bool
    {
        $response = $this->request('Add', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @return Entry[]
     * @throws GuzzleException
     */
    public function feed(FeedInput $input): array
    {
        $response = $this->request('Feed', $input->toArray());
        return $this->parseResponseAsModels($response, Entry::class, 'entities');
    }

    /**
     * @return Feed[]
     * @throws GuzzleException
     */
    public function list(): array
    {
        $response = $this->request('List', []);
        return $this->parseResponseAsModels($response, Feed::class, 'feeds');
    }

    /**
     * @throws GuzzleException
     */
    public function remove(string $name): bool
    {
        $response = $this->request('Remove', ['name' => $name]);
        return $response->getStatusCode() === 200;
    }
}