<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter\ValueObject;

readonly class TableDescriptions
{
    /**
     * @param array<string, string> $columns descriptions keyed by destination (database) column name
     */
    public function __construct(
        private ?string $table = null,
        private array $columns = [],
    ) {
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function hasTable(): bool
    {
        return $this->table !== null && $this->table !== '';
    }

    /**
     * @return array<string, string>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    public function isEmpty(): bool
    {
        return !$this->hasTable() && $this->columns === [];
    }
}
