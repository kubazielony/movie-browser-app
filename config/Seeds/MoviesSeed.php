<?php

declare(strict_types=1);

use Migrations\BaseSeed;

class MoviesSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through dream-sharing technology.',
                'release_year' => 2010,
                'rating' => 8.8,
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'Batman faces a criminal mastermind known as the Joker.',
                'release_year' => 2008,
                'rating' => 9.0,
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travels through a wormhole in space.',
                'release_year' => 2014,
                'rating' => 8.7,
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A hacker discovers that reality is not what it seems.',
                'release_year' => 1999,
                'rating' => 8.7,
            ],
        ];

        $this->table('movies')->insert($data)->save();
    }
}
