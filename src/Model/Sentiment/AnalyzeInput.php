<?php
declare(strict_types=1);

namespace M3O\Model\Sentiment;


use M3O\Model\AbstractModel;

class AnalyzeInput extends AbstractModel
{
    private string $lang;
    private string $text;

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): AnalyzeInput
    {
        $this->lang = $lang;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): AnalyzeInput
    {
        $this->text = $text;
        return $this;
    }

    public static function fromArray(array $array): AnalyzeInput
    {
        return (new AnalyzeInput())
            ->setLang((string) ($array['lang'] ?? ''))
            ->setText((string) ($array['text'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'lang' => $this->getLang(),
            'text' => $this->getText()
        ];
    }
}
