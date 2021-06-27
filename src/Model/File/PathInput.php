<?php
declare(strict_types=1);

namespace M3O\Model\File;


use M3O\Model\AbstractModel;

class PathInput extends AbstractModel
{
    private string $path;
    private string $project;

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): PathInput
    {
        $this->path = $path;
        return $this;
    }

    public function getProject(): string
    {
        return $this->project;
    }

    public function setProject(string $project): PathInput
    {
        $this->project = $project;
        return $this;
    }

    public static function fromArray(array $array): PathInput
    {
        return (new PathInput())
            ->setPath((string) ($array['path'] ?? ''))
            ->setProject((string) ($array['project'] ?? ''));
    }

    public function toArray(): array
    {
        return [
            'path' => $this->getPath(),
            'project' => $this->getProject()
        ];
    }
}