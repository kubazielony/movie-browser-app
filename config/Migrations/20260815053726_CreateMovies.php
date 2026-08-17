<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateMovies extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('movies');

        $table
            ->addColumn('title', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
            ])
            ->addColumn('release_year', 'integer', [
                'null' => true,
            ])
            ->addColumn('rating', 'decimal', [
                'precision' => 3,
                'scale' => 1,
                'null' => true,
            ])
            ->addColumn('image', 'string', [
                'limit' => 500,
                'null' => true,
            ])
            ->create();
    }
}
