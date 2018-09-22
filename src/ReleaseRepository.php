<?php declare(strict_types=1);

namespace SemanticVersioning;

interface ReleaseRepository
{
    public function save(Release $release): void;

    public function getHistory(): ReleaseHistory;

    public function getLastRelease(): Release;
}