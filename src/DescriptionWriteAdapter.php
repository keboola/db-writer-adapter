<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;

/**
 * Separate from WriteAdapter so existing implementers stay compatible; writers opt in.
 *
 * Contract for implementers (the caller has already checked the `propagateDescriptions` toggle):
 * - Descriptions and column names are user input: use Connection::quote() / quoteIdentifier(), never interpolate.
 * - Only non-empty descriptions arrive; never clear an existing comment.
 * - Values over the backend limit are truncated with a logged warning, not rejected.
 * - Columns missing in the target table are skipped with a logged warning.
 * - Exceptions may be thrown; the caller logs them as a warning and the data write still succeeds.
 */
interface DescriptionWriteAdapter
{
    public function applyDescriptions(string $tableName, TableDescriptions $descriptions): void;
}
