<?php declare(strict_types=1);

namespace SemanticVersioning\Tests;

use PHPUnit\Framework\TestCase;
use SemanticVersioning\Version;

class VersionTest extends TestCase
{
    public function testCanCreateItselfFromString(): void
    {
        self::assertSame(
            (string) Version::fromString('1.2.3'),
            (string) new Version(1, 2, 3)
        );
    }
}