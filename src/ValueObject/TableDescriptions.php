<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter\ValueObject;

readonly class TableDescriptions
{
    private ?string $table;

    /** @var array<string, string> */
    private array $columns;

    /**
     * @param array<string, string> $columns keyed by destination column name; empty descriptions are dropped
     */
    public function __construct(?string $table, array $columns)
    {
        $this->table = $table === '' ? null : $table;
        $this->columns = array_filter($columns, fn(string $description) => $description !== '');
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    /**
     * PHP turns integer-like keys (column "123") into int, so cast the key with (string) before using it.
     *
     * @return array<string, string>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    public function isEmpty(): bool
    {
        return $this->table === null && $this->columns === [];
    }
}
