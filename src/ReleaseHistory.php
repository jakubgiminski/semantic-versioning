<?php declare(strict_types=1);

namespace SemanticVersioning;

class ReleaseHistory
{
    private $history;

    private function __construct(array $notes)
    {
        $this->history = $notes;
    }
}