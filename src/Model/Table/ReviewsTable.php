<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ReviewsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('reviews');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
        ]);
    }

    public function getAverageRating(int $movieId): ?float
    {
        $result = $this->find()
            ->where([
                'movie_id' => $movieId,
            ])
            ->select([
                'average_rating' => $this->find()->func()->avg('rating'),
            ])
            ->first();

        if ($result === null || $result->average_rating === null) {
            return null;
        }

        return round((float)$result->average_rating, 1);
    }
}
