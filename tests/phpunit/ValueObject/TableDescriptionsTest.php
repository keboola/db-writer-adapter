<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter\Tests\ValueObject;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TableDescriptionsTest extends TestCase
{
    /**
     * @dataProvider descriptionsProvider
     * @param array<string, string> $columns
     * @param array<string, string> $expectedColumns
     */
    public function testDescriptions(
        ?string $table,
        array $columns,
        bool $expectedEmpty,
        ?string $expectedTable,
        array $expectedColumns,
    ): void {
        $descriptions = new TableDescriptions($table, $columns);

        Assert::assertSame($expectedEmpty, $descriptions->isEmpty());
        Assert::assertSame($expectedTable, $descriptions->getTable());
        Assert::assertSame($expectedColumns, $descriptions->getColumns());
    }

    /**
     * @return array<string, array{?string, array<string, string>, bool, ?string, array<string, string>}>
     */
    public function descriptionsProvider(): array
    {
        return [
            'all empty' => [null, [], true, null, []],
            'empty-string table, no columns' => ['', [], true, null, []],
            'table only' => ['Orders table', [], false, 'Orders table', []],
            'columns only' => [null, ['id' => 'Primary key'], false, null, ['id' => 'Primary key']],
            'empty column description is dropped' => [
                null,
                ['id' => '', 'name' => 'Customer name'],
                false,
                null,
                ['name' => 'Customer name'],
            ],
            'only empty column descriptions' => ['', ['id' => ''], true, null, []],
        ];
    }
}
