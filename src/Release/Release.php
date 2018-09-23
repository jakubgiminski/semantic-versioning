<?php declare(strict_types=1);

namespace SemanticVersioning\Release;

use SemanticVersioning\Version;

class Release
{
    private $type;

    private $notes;

    private $version;

    private $timestamp;

    public function __construct(ReleaseType $type, ReleaseNotes $notes, Version $version, int $timestamp)
    {
        $this->type = $type;
        $this->notes = $notes;
        $this->version = $version;
        $this->timestamp = $timestamp;
    }

    public function getType(): ReleaseType
    {
        return $this->type;
    }

    public function getNotes(): ReleaseNotes
    {
        return $this->notes;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }
}