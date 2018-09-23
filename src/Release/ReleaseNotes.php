<?php declare(strict_types=1);

namespace SemanticVersioning\Release;

class ReleaseNotes
{
    private $notes;

    private function __construct(array $notes)
    {
        $this->notes = $notes;
    }
}