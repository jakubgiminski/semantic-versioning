<?php declare(strict_types=1);

namespace SemanticVersioning\Release;

use DateTime;
use SemanticVersioning\Version;

class ReleaseManager
{
    private $repository;

    public function __construct(ReleaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getHistory(): ReleaseHistory
    {
        return $this->repository->getHistory();
    }

    public function releaseMajorVersion(ReleaseNotes $notes): Release
    {
        $this->release(ReleaseType::major(), $notes);
    }

    public function releaseMinorVersion(ReleaseNotes $notes): Release
    {
        $this->release(ReleaseType::minor(), $notes);
    }

    public function releasePatch(ReleaseNotes $notes): Release
    {
        $this->release(ReleaseType::patch(), $notes);
    }

    private function release(ReleaseType $type, ReleaseNotes $notes): Release
    {
        $lastRelease = $this->repository->getLastRelease();

        $release = new Release(
            $type,
            $notes,
            $this->incrementVersion($type, $lastRelease->getVersion()),
            (new DateTime())->getTimestamp()
        );

        $this->repository->save($release);

        return $release;
    }

    private function incrementVersion(ReleaseType $type, Version $version): Version
    {
        switch ((string) $type) {
            case (string) ReleaseType::major():
                return $version->incrementMajor();
            case (string) ReleaseType::minor():
                return $version->incrementMinor();
            case (string) ReleaseType::patch():
                return $version->incrementPatch();
        }
    }
}