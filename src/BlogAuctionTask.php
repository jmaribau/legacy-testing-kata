<?php declare(strict_types=1);

namespace Quotebot;

use MarketStudyVendor;
use Exception;
use DateTime;

class BlogAuctionTask
{
    private const TIME_FACTOR = 1;
    private const INCREMENTAL_PROPOSAL = 1;

    /** @var MarketStudyVendor */
    private $marketDataRetriever;

    public function __construct()
    {
        $this->marketDataRetriever = new MarketStudyVendor();
    }

    public function priceAndPublish(string $blog, string $mode): void
    {
        try {
            $avgPrice = $this->marketDataRetriever->averagePrice($blog);
            $timeFactor = $this->getTimeFactor($mode);
            $proposal = $this->getProposal($avgPrice, $timeFactor);
            $this->getPublish($proposal);
        } catch (Exception $exception) {
            throw new Exception('Unexpected exception');
        }
    }

    /**
     * @param $proposal
     */
    private function getPublish($proposal): void
    {
        \QuotePublisher::publish($proposal);
    }

    /**
     * @param string $mode
     * @return int
     */
    public function getTimeFactor(string $mode): int
    {
        $timeFactor = self::TIME_FACTOR;

        if ($mode === 'SLOW') {
            $$timeFactor = 2;
        }

        if ($mode === 'MEDIUM') {
            $$timeFactor = 4;
        }

        if ($mode === 'FAST') {
            $$timeFactor = 8;
        }

        if ($mode === 'ULTRAFAST') {
            $$timeFactor = 16;
        }

        return $timeFactor;
    }

    /**
     * @param float $avgPrice
     * @param int $timeFactor
     * @return float|int
     * @throws \Exception
     */
    public function getProposal(float $avgPrice, int $timeFactor): float
    {
        // FIXME should actually be +2 not +1

        $proposal = $avgPrice + self::INCREMENTAL_PROPOSAL;

        return
            ($proposal) % 2 === 0 ?
            3.14 * $proposal :
            3.15 * $timeFactor * (new DateTime())->getTimestamp() - (new DateTime('2000-1-1'))->getTimestamp();

    }
}
