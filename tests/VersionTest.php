<?php declare(strict_types=1);

namespace SemanticVersioning\Tests;

use PHPUnit\Framework\TestCase;
use SemanticVersioning\Version;

class VersionTest extends TestCase
{
    public function testCanBeParsedToString(): void
    {
        self::assertSame(
            '1.2.3',
            (string) new Version(1, 2, 3)
        );
    }

    public function testCanBeCreatedFromString(): void
    {
        self::assertSame(
            (string) Version::fromString('1.2.3'),
            (string) new Version(1, 2, 3)
        );
    }

    public function testCannotBeCreatedFromInvalidString(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Version::fromString('invalid string');
    }

    public function testCanCheckIfEquals(): void
    {
        self::assertTrue(
            (new Version(1, 2, 3))->equals(new Version(1,2,3))
        );

        self::assertFalse(
            (new Version(1, 2, 3))->equals(new Version(3,2,1))
        );
    }

    public function testCanCheckIfIsNotNewerThan(): void
    {
        self::assertFalse(
            (new Version(1, 2, 3))->isNewerThan(new Version(1, 2, 3))
        );

        self::assertFalse(
            (new Version(1, 2, 3))->isNewerThan(new Version(1, 2, 4))
        );
    }

    public function testCanCheckIfIsNewerThan(): void
    {
        self::assertTrue(
            (new Version(1, 2, 4))->isNewerThan(new Version(1, 2, 3))
        );

        self::assertTrue(
            (new Version(1, 3, 3))->isNewerThan(new Version(1, 2, 3))
        );

        self::assertTrue(
            (new Version(2, 2, 3))->isNewerThan(new Version(1, 2, 3))
        );
    }

    public function testCanCheckIfIsOlderThan(): void
    {
        self::assertTrue(
            (new Version(1, 2, 3))->isOlderThan(new Version(1, 2, 4))
        );

        self::assertTrue(
            (new Version(1, 2, 3))->isOlderThan(new Version(1, 3, 3))
        );

        self::assertTrue(
            (new Version(1, 2, 3))->isOlderThan(new Version(2, 2, 3))
        );
    }

    public function testCanCheckIfIsNotOlderThan(): void
    {
        self::assertFalse(
            (new Version(1, 2, 4))->isOlderThan(new Version(1, 2, 3))
        );

        self::assertFalse(
            (new Version(1, 3, 3))->isOlderThan(new Version(1, 2, 3))
        );

        self::assertFalse(
            (new Version(2, 2, 3))->isOlderThan(new Version(1, 2, 3))
        );
    }
}