<?php declare(strict_types=1);

namespace SemanticVersioning;

class Release
{
    private $type;

    private $notes;

    private $version;

    private $timestamp;

    public function __construct(ReleaseType $type, ReleaseNotes $notes, Version $version, \DateTime $timestamp)
    {
        $this->type = $type;
        $this->notes = $notes;
        $this->version = $version;
        $this->timestamp = $timestamp;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }
}