<?php
declare(strict_types=1);

namespace M3O\Service;


use GuzzleHttp\Exception\GuzzleException;
use M3O\Model\Answer\QuestionOutput;

class Answer extends AbstractService
{
    public function getServiceName(): string
    {
        return 'answer';
    }

    /**
     * @throws GuzzleException
     */
    public function question(string $query): ?QuestionOutput
    {
        $response = $this->request('Question', ['query' => $query]);
        return $this->parseResponseAsModel($response, QuestionOutput::class);
    }
}
