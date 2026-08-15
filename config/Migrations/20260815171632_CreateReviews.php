<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateReviews extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('reviews');

        $table
            ->addColumn('user_id', 'integer')
            ->addColumn('movie_id', 'integer')
            ->addColumn('rating', 'integer')
            ->addColumn('description', 'text')
            ->create();
    }
}
