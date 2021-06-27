<?php


namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\File\File as FileModel;
use M3O\Model\File\PathInput;

class File extends AbstractService
{
    public function getServiceName(): string
    {
        return 'file';
    }

    /**
     * @throws GuzzleException
     */
    public function delete(PathInput $input): bool
    {
        $response = $this->request('Delete', $input->toArray());
        return $response->getStatusCode() === 200;
    }

    /**
     * @return FileModel[]
     * @throws GuzzleException
     */
    public function list(PathInput $input): array
    {
        $response = $this->request('List', $input->toArray());
        return $this->parseResponseAsModels($response, FileModel::class);
    }

    /**
     * @throws GuzzleException
     */
    public function read(PathInput $input): ?FileModel
    {
        $response = $this->request('List', $input->toArray());
        return $this->parseResponseAsModel($response, FileModel::class);
    }

    /**
     * @throws GuzzleException
     */
    public function save(FileModel $file): bool
    {
        $response = $this->request('Save', $file->toArray());
        return $response->getStatusCode() === 200;
    }
}