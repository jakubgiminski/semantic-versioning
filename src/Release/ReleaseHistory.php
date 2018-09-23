<?php declare(strict_types=1);

namespace SemanticVersioning\Release;

use InvalidArgumentException;

class ReleaseHistory
{
    private $releases;

    public function __construct(array $releases)
    {
        $this->validate($releases);
        $this->releases = $this->sortByTimestamp($releases);
    }

    private function validate(array $releases): void
    {
        foreach ($releases as $release) {
            if (!$release instanceof Release) {
                $invalidType = get_class($release);
                $expectedType = Release::class;
                throw new InvalidArgumentException("Invalid type $invalidType; expected type is $expectedType");
            }
        }
    }

    private function sortByTimestamp(array $releases): array
    {
        // @todo
    }
}