<?php

namespace App\Controller\Api;

use App\Controller\AppController;

class MoviesController extends AppController{
    public function index(): void{
        $this->request->allowMethod(['get']);
        $movies = $this->fetchTable('Movies')
            ->find()
            ->all();

        $this->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'movies');


        $this->set([
            'movies' => $movies,
        ]);
    }

    public function view($id): void{
        $this->request->allowMethod(['get']);
        $movie = $this->fetchTable('Movies')->get($id);

        $this->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'movie');

        $this->set([
            'movie' => $movie,
        ]);

    }
}
