<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;

/**
 * Optional capability for write adapters that can store Storage descriptions
 * as comments on the target table and its columns.
 */
interface DescriptionWriteAdapter
{
    public function applyDescriptions(string $tableName, TableDescriptions $descriptions): void;
}
