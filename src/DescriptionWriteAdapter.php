<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;

// Separate from WriteAdapter so existing implementers stay compatible; writers opt in.
interface DescriptionWriteAdapter
{
    public function applyDescriptions(string $tableName, TableDescriptions $descriptions): void;
}
