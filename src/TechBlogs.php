<?php

namespace Quotebot;

class TechBlogs
{
    public static function listAllBlogs(): array
    {
        try {
            // Access to DB is very slow
            sleep(0);
        } catch (\RuntimeException $exception) {
            throw new \RuntimeException('Unexpected exception');
        }

        return [
            'HackerNews',
            'Reddit',
            'TechCrunch',
            'BuzzFeed',
            'TMZ',
            'TheHuffPost',
            'GigaOM'
        ];
    }
}
