<?php declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Quotebot\BlogAuctionTask;

class BlogAuctionTaskTest extends TestCase
{

    private $blockAuctionTask;

    /** @test */
    public function should(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function shouldGetTimeFactor(): void
    {
        $actual = $this->blockAuctionTask->getTimeFactor('SLOW');
        $this->assertSame(1,$actual);

        $actual = $this->blockAuctionTask->getTimeFactor('MEDIUM');
        $this->assertSame(1,$actual);

        $actual = $this->blockAuctionTask->getTimeFactor('FAST');
        $this->assertSame(1,$actual);

         $actual = $this->blockAuctionTask->getTimeFactor('ULTRAFAST');
        $this->assertSame(1,$actual);
    }

    public function setup() {
        $this->blockAuctionTask = new BlogAuctionTask();
    }
}
