<?php declare(strict_types=1);

namespace SemanticVersioning;

class Version
{
    private $major;

    private $minor;

    private $patch;

    public function __construct(int $major, int $minor, int $patch)
    {
        $this->major = $major;
        $this->minor = $minor;
        $this->patch = $patch;
    }

    public static function fromString(string $version): self
    {
        self::validateVersionString($version);

        $version = explode('.', $version);

        return new self(
            (int) $version[0],
            (int) $version[1],
            (int) $version[2]
        );
    }

    public function __toString(): string
    {
        return "{$this->major}.{$this->minor}.{$this->patch}";
    }

    public function equals(self $version): bool
    {
        return (string) $this === (string) $version;
    }

    public function isNewerThan(self $version): bool
    {
        if ($this->equals($version)) {
            return false;
        }

        if ($this->isMajorHigherThan($version->getMajor())) {
            return true;
        } elseif ($this->isMajorLowerThan($version->getMajor())) {
            return false;
        }

        if ($this->isMinorHigherThan($version->getMinor())) {
            return true;
        } elseif ($this->isMinorLowerThan($version->getMajor())) {
            return false;
        }

        return $this->isPatchHigherThan($version->getPatch());
    }

    public function isOlderThan(self $version): bool
    {
        return !$this->equals($version) && !$this->isNewerThan($version);
    }

    public function getMajor(): int
    {
        return $this->major;
    }

    public function getMinor(): int
    {
        return $this->minor;
    }

    public function getPatch(): int
    {
        return $this->patch;
    }

    private static function validateVersionString(string $version): void
    {
        if (count(explode('.', $version)) !== 3) {
            throw new \InvalidArgumentException('Required format is: MINOR.MAJOR.PATCH');
        }
    }

    private function isMajorHigherThan(int $major): bool
    {
        return $this->major > $major;
    }

    private function isMajorLowerThan(int $major): bool
    {
        return !$this->isMajorHigherThan($major);
    }

    private function isMinorHigherThan(int $minor): bool
    {
        return $this->minor > $minor;
    }

    private function isMinorLowerThan(int $minor): bool
    {
        return !$this->isMinorHigherThan($minor);
    }

    private function isPatchHigherThan(int $patch): bool
    {
        return $this->patch > $patch;
    }
}