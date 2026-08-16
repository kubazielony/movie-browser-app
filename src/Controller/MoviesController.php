<?php


namespace App\Controller;

use App\Controller\AppController;

class MoviesController extends AppController
{
    public function index(): void
    {
        $this->request->allowMethod(['get']);
        $movies = $this->fetchTable('Movies')
            ->find()
            ->all();

        $user = $this->request->getSession()->read('Auth.user');

        $reviewsTable = $this->fetchTable('Reviews');

        foreach ($movies as $movie) {
            $movie->rating = $reviewsTable->getAverageRating($movie->id);
        }

        $this->set([
            'movies' => $movies,
            'user' => $user,

        ]);
    }

    public function view($id): void
    {
        $this->request->allowMethod(['get']);

        $movie = $this->fetchTable('Movies')->get($id);

        $reviewsTable = $this->fetchTable('Reviews');

        $reviews = $reviewsTable
            ->find()
            ->where([
                'movie_id' => $id,
            ])
            ->contain(['Users'])
            ->all();

        $movie->rating = $reviewsTable->getAverageRating($movie->id);

        $user = $this->request->getSession()->read('Auth.user');

        $this->set([
            'movie' => $movie,
            'reviews' => $reviews,
            'user' => $user,
        ]);
    }

    public function review($id): void
    {
        $this->request->allowMethod(['post']);

        $user = $this->request->getSession()->read('Auth.user');

        $reviewsTable = $this->fetchTable('Reviews');

        $review = $reviewsTable->newEntity([
            'user_id' => $user['id'],
            'movie_id' => $id,
            'rating' => $this->request->getData('rating'),
            'description' => $this->request->getData('description'),
        ]);

        if ($reviewsTable->save($review)) {
            $this->Flash->success('Review added.');
        } else {
            $this->Flash->error('Could not add review.');
        }

        $this->redirect(['action' => 'view', $id]);
    }
}
