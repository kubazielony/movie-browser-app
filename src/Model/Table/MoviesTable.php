<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class MoviesTable extends Table{
    public function initialize(array $config): void{
        parent::initialize($config);

        $this->setTable('movies');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }
}
