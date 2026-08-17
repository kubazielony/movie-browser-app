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
                'image' => 'uploads/movies/inception.jpg',
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'Batman faces a criminal mastermind known as the Joker.',
                'release_year' => 2008,
                'rating' => 9.0,
                'image' => 'uploads/movies/the-dark-knight.jpg',
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travels through a wormhole in space.',
                'release_year' => 2014,
                'rating' => 8.7,
                'image' => 'uploads/movies/interstellar.jpg',
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A hacker discovers that reality is not what it seems.',
                'release_year' => 1999,
                'rating' => 8.7,
                'image' => 'uploads/movies/the-matrix.jpg',
            ],
            [
                'title' => 'Pulp Fiction',
                'description' => 'Several interconnected stories unfold in the criminal underworld of Los Angeles.',
                'release_year' => 1994,
                'rating' => 8.9,
                'image' => 'uploads/movies/pulp-fiction.jpg',
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his empire to his reluctant son.',
                'release_year' => 1972,
                'rating' => 9.2,
                'image' => 'uploads/movies/the-godfather.jpg',
            ],
            [
                'title' => 'Fight Club',
                'description' => 'An unhappy office worker forms an underground fight club with a mysterious new friend.',
                'release_year' => 1999,
                'rating' => 8.8,
                'image' => 'uploads/movies/fight-club.jpg',
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'A kind-hearted man experiences several major events in American history.',
                'release_year' => 1994,
                'rating' => 8.8,
                'image' => 'uploads/movies/forrest-gump.jpg',
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'A banker sentenced to life in prison forms an unlikely friendship and never gives up hope.',
                'release_year' => 1994,
                'rating' => 9.3,
                'image' => 'uploads/movies/the-shawshank-redemption.jpg',
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A Roman general seeks revenge after being betrayed and forced into slavery.',
                'release_year' => 2000,
                'rating' => 8.5,
                'image' => 'uploads/movies/gladiator.jpg',
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'description' => 'The final battle for Middle-earth begins as the heroes attempt to destroy the One Ring.',
                'release_year' => 2003,
                'rating' => 9.0,
                'image' => 'uploads/movies/return-of-the-king.jpg',
            ],
            [
                'title' => 'Avengers: Endgame',
                'description' => 'The surviving Avengers attempt to undo the devastating events caused by Thanos.',
                'release_year' => 2019,
                'rating' => 8.4,
                'image' => 'uploads/movies/avengers-endgame.jpg',
            ],
            [
                'title' => 'Parasite',
                'description' => 'A struggling family gradually becomes involved with a wealthy household.',
                'release_year' => 2019,
                'rating' => 8.5,
                'image' => 'uploads/movies/parasite.jpg',
            ],
            [
                'title' => 'Whiplash',
                'description' => 'A young drummer is pushed to his limits by an uncompromising music instructor.',
                'release_year' => 2014,
                'rating' => 8.5,
                'image' => 'uploads/movies/whiplash.jpg',
            ],
            [
                'title' => 'The Prestige',
                'description' => 'Two rival magicians become obsessed with creating the ultimate illusion.',
                'release_year' => 2006,
                'rating' => 8.5,
                'image' => 'uploads/movies/the-prestige.jpg',
            ],
            [
                'title' => 'Django Unchained',
                'description' => 'A freed slave teams up with a bounty hunter to rescue his wife from a brutal plantation owner.',
                'release_year' => 2012,
                'rating' => 8.5,
                'image' => 'uploads/movies/django-unchained.jpg',
            ],
            [
                'title' => 'Goodfellas',
                'description' => 'A young man rises through the ranks of a New York crime family.',
                'release_year' => 1990,
                'rating' => 8.7,
                'image' => 'uploads/movies/goodfellas.jpg',
            ],
            [
                'title' => 'The Silence of the Lambs',
                'description' => 'A young FBI trainee seeks the help of an imprisoned serial killer to catch another murderer.',
                'release_year' => 1991,
                'rating' => 8.6,
                'image' => 'uploads/movies/the-silence-of-the-lambs.jpg',
            ],
            [
                'title' => 'Back to the Future',
                'description' => 'A teenager accidentally travels back in time and must ensure his parents meet.',
                'release_year' => 1985,
                'rating' => 8.5,
                'image' => 'uploads/movies/back-to-the-future.jpg',
            ],
            [
                'title' => 'Jurassic Park',
                'description' => 'Scientists discover that cloned dinosaurs have escaped from a prehistoric theme park.',
                'release_year' => 1993,
                'rating' => 8.2,
                'image' => 'uploads/movies/jurassic-park.jpg',
            ],
        ];

        $this->table('movies')->insert($data)->save();
    }
}
