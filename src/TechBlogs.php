<?php

namespace Quotebot;

use RuntimeException;

class TechBlogs
{
    public function listAllBlogs(): array
    {
        try {
            // Access to DB is very slow
            sleep(0);

            return [
                'HackerNews',
                'Reddit',
                'TechCrunch',
                'BuzzFeed',
                'TMZ',
                'TheHuffPost',
                'GigaOM'
            ];

        } catch (RuntimeException $exception) {
            throw new RuntimeException('Unexpected exception');
        }
    }
}
