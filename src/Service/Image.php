<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Image\ConvertInput;
use M3O\Model\Image\Output;
use M3O\Model\Image\ResizeInput;
use M3O\Model\Image\UploadInput;

class Image extends AbstractService
{
    public function getServiceName(): string
    {
        return 'image';
    }

    /**
     * @throws GuzzleException
     */
    public function convert(ConvertInput $input): ?Output
    {
        $response = $this->request('Convert', $input->toArray());
        return $this->parseResponseAsModel($response, Output::class);
    }

    /**
     * @throws GuzzleException
     */
    public function resize(ResizeInput $input): ?Output
    {
        $response = $this->request('Resize', $input->toArray());
        return $this->parseResponseAsModel($response, Output::class);
    }

    /**
     * @throws GuzzleException
     */
    public function upload(UploadInput $input): ?string
    {
        $response = $this->request('Upload', $input->toArray());
        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $json = $this->parseResponseAsArray($response);
        return $json['url'] ?? null;
    }
}