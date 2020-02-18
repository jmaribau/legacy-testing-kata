<?php declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Quotebot\AdSpace;

class AddSpaceTest extends TestCase
{
    /** @test */
    public function shouldReturnExpectedArray(): void
    {
        $expected = ['HackerNews', 'Reddit', 'TechCrunch', 'BuzzFeed', 'TMZ', 'TheHuffPost', 'GigaOM'];

        $result = AdSpace::getAdSpaces();
        $this->assertNotEmpty($result);
        $this->assertInternalType('array', $result);
        $this->assertContainsOnly('string', $result);
        $this->assertSame($expected, $result);
    }
}
