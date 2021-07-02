<?php
declare(strict_types=1);

namespace M3O\Model\Answer;


use M3O\Model\AbstractModel;

class QuestionOutput extends AbstractModel
{
    private string $answer;
    private string $image;
    private string $url;

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     * @return QuestionOutput
     */
    public function setAnswer(string $answer): QuestionOutput
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): QuestionOutput
    {
        $this->image = $image;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): QuestionOutput
    {
        $this->url = $url;
        return $this;
    }

    public static function fromArray(array $array): QuestionOutput
    {
        return (new QuestionOutput())
            ->setAnswer((string) ($array['answer'] ?? ''))
            ->setImage((string) ($array['image'] ?? ''))
            ->setUrl((string) ($array['url'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'answer' => $this->getAnswer(),
            'url' => $this->getUrl(),
            'image' => $this->getImage()
        ];
    }
}
