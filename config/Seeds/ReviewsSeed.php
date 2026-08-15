<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * ReviewsSeed seed.
 */
class ReviewsSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'movie_id' => 1,
                'rating' => 5,
                'description' => 'Great movie, I really enjoyed it.',
            ],
            [
                'user_id' => 1,
                'movie_id' => 1,
                'rating' => 4,
                'description' => 'A very good production, definitely worth watching.',
            ],
            [
                'user_id' => 2,
                'movie_id' => 1,
                'rating' => 3,
                'description' => 'Pretty decent movie, but some things could have been better.',
            ],
            [
                'user_id' => 3,
                'movie_id' => 1,
                'rating' => 5,
                'description' => 'Amazing movie. One of my favorites.',
            ],
        ];

        $table = $this->table('reviews');
        $table->insert($data)->save();
    }
}
