<?php


namespace App\Controller;

use App\Controller\AppController;

class MoviesController extends AppController
{
    public function index(): void {
        $this->request->allowMethod(['get']);
        $movies = $this->fetchTable('Movies')
            ->find()
            ->all();

        $user = $this->request->getSession()->read('Auth.user');

        $this->set([
            'movies' => $movies,
            'user' => $user,

        ]);
    }

    public function view($id): void {
        $this->request->allowMethod(['get']);
        $movie = $this->fetchTable('Movies')->get($id);
        $user = $this->request->getSession()->read('Auth.user');

        $this->set([
            'movie' => $movie,
            'user' => $user,
        ]);
    }
}
