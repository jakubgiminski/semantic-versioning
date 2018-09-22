<?php declare(strict_types=1);

namespace SemanticVersioning;

class ReleaseNotes
{
    private $notes;

    private function __construct(array $notes)
    {
        $this->notes = $notes;
    }
}