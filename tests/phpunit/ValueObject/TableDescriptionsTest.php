<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter\Tests\ValueObject;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TableDescriptionsTest extends TestCase
{
    /**
     * @dataProvider isEmptyProvider
     * @param array<string, string> $columns
     */
    public function testIsEmpty(?string $table, array $columns, bool $expected): void
    {
        $descriptions = new TableDescriptions($table, $columns);

        Assert::assertSame($expected, $descriptions->isEmpty());
        Assert::assertSame($table, $descriptions->getTable());
        Assert::assertSame($columns, $descriptions->getColumns());
    }

    /**
     * @return array<string, array{?string, array<string, string>, bool}>
     */
    public function isEmptyProvider(): array
    {
        return [
            'all empty' => [null, [], true],
            'empty-string table, no columns' => ['', [], true],
            'table only' => ['Orders table', [], false],
            'columns only' => [null, ['id' => 'Primary key'], false],
        ];
    }
}
