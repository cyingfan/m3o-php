<?php
declare(strict_types=1);

namespace M3O\Model\File;


use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use M3O\Model\AbstractModel;

class File extends AbstractModel
{
    private string $content;
    private DateTimeInterface $created;
    /** @var array<string, mixed> */
    private array $metadata;
    private string $path;
    private string $project;
    private DateTimeInterface $updated;

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): File
    {
        $this->content = $content;
        return $this;
    }

    public function getCreated(): DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param DateTimeInterface|string $created
     * @return File
     * @throws Exception
     */
    public function setCreated($created): File
    {
        if (is_string($created)) {
            $created = new DateTimeImmutable($created);
        }
        $this->created = $created;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array<string, mixed> $metadata
     * @return File
     */
    public function setMetadata(array $metadata): File
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): File
    {
        $this->path = $path;
        return $this;
    }

    public function getProject(): string
    {
        return $this->project;
    }

    public function setProject(string $project): File
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdated(): DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * @param DateTimeInterface|string $updated
     * @return File
     * @throws Exception
     */
    public function setUpdated($updated): File
    {
        if (is_string($updated)) {
            $updated = new DateTimeImmutable($updated);
        }
        $this->updated = $updated;
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $array): File
    {
        return (new File())
            ->setContent((string) ($array['content'] ?? ''))
            ->setCreated($array['created'] ?? 'now')
            ->setMetadata((array) ($array['metadata'] ?? []))
            ->setPath((string) ($array['path'] ?? ''))
            ->setProject((string) ($array['project'] ?? ''))
            ->setUpdated($array['updated'] ?? '');
    }

    public function toArray(): array
    {
        return [
            'content' => $this->getContent(),
            'created' => $this->getCreated()->format(DateTimeInterface::ATOM),
            'metadata' => $this->getMetadata(),
            'path' => $this->getPath(),
            'project' => $this->getProject(),
            'updated' => $this->getUpdated()->format(DateTimeInterface::ATOM)
        ];
    }
}