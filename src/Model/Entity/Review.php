<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Review extends Entity
{
    protected array $_accessible = [
        'user' => true,
        'movie' => true,
        'movie_id' => true,
        'user_id' => true,
        'rating' => true,
        'description' => true,
    ];
}
