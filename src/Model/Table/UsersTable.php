<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('username', 'create')
            ->notEmptyString('username', 'Username cannot be empty.')
            ->minLength('username', 3, 'Username must be at least 3 characters long.')
            ->maxLength('username', 50, 'Username cannot be longer than 50 characters.');

        $validator
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'Password cannot be empty.')
            ->minLength('password', 6, 'Password must be at least 6 characters long.');

        return $validator;
    }
}
