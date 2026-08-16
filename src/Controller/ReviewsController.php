<?php

namespace App\Controller;

use App\Controller\AppController;

class ReviewsController extends AppController
{
    public function index(): void
    {
        $this->request->allowMethod(['get']);

        $movies = $this->fetchTable('Movies')
            ->find()
            ->all();

        $reviewsTable = $this->fetchTable('Reviews');

        $user = $this->request->getSession()->read('Auth.user');

        $this->set([
            'movies' => $movies,
            'user' => $user,
        ]);
    }

    public function view($id)
    {
        $this->request->allowMethod(['get']);

        $review = $this->fetchTable('Reviews')
            ->find()
            ->contain(['Users', 'Movies'])
            ->where([
                'Reviews.id' => $id,
            ])
            ->firstOrFail();

        $this->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'review');

        $this->set([
            'review' => $review,
        ]);
    }
}
