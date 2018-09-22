<?php declare(strict_types=1);

namespace SemanticVersioning;

class ReleaseType
{
    private $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function major(): self
    {
        return new self('major');
    }

    public static function minor(): self
    {
        return new self('minor');
    }

    public static function patch(): self
    {
        return new self('patch');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}