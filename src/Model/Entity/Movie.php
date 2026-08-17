<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Movie extends Entity
{
    protected array $_accessible = [
        'title' => true,
        'description' => true,
        'release_year' => true,
        'rating' => true,
        'image' => true
    ];
}
