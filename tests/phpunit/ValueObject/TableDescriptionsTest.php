<?php

declare(strict_types=1);

namespace Keboola\DbWriterAdapter\Tests\ValueObject;

use Keboola\DbWriterAdapter\ValueObject\TableDescriptions;
use PHPUnit\Framework\TestCase;

class TableDescriptionsTest extends TestCase
{
    public function testEmptyByDefault(): void
    {
        $descriptions = new TableDescriptions();

        self::assertTrue($descriptions->isEmpty());
        self::assertFalse($descriptions->hasTable());
        self::assertNull($descriptions->getTable());
        self::assertSame([], $descriptions->getColumns());
    }

    public function testEmptyStringTableIsEmpty(): void
    {
        self::assertTrue((new TableDescriptions(''))->isEmpty());
    }

    public function testTableOnly(): void
    {
        $descriptions = new TableDescriptions('Orders table');

        self::assertFalse($descriptions->isEmpty());
        self::assertTrue($descriptions->hasTable());
        self::assertSame('Orders table', $descriptions->getTable());
        self::assertSame([], $descriptions->getColumns());
    }

    public function testColumnsOnly(): void
    {
        $descriptions = new TableDescriptions(null, ['order_id' => 'Order identifier']);

        self::assertFalse($descriptions->isEmpty());
        self::assertFalse($descriptions->hasTable());
        self::assertSame(['order_id' => 'Order identifier'], $descriptions->getColumns());
    }
}
