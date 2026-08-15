<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;

class User extends Entity{
    protected array $_accessible = [
        'username' => true,
        'password' => true
    ];
}
