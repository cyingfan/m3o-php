<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Thumbnail\ScreenshotInput;

class Thumbnail extends AbstractService
{
    public function getServiceName(): string
    {
        return 'thumbnail';
    }

    /**
     * @throws GuzzleException
     */
    public function screenshot(ScreenshotInput $input): ?string
    {
        $response = $this->request('Screenshot', $input->toArray());
        $json = $this->parseResponseAsArray($response);
        return $json['imageURL'] ?? null;
    }
}
