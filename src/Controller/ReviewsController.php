<?php

namespace App\Controller;

use App\Controller\AppController;

class ReviewsController extends AppController
{
    public function index()
    {
        $this->request->allowMethod(['get']);

        $reviews = $this->fetchTable('Reviews')
            ->find()
            ->contain(['Users', 'Movies'])
            ->all();

        $this->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'reviews');

        $this->set([
            'reviews' => $reviews,
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
