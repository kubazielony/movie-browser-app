<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index()
    {
        $this->request->allowMethod(['get']);

        $users = $this->fetchTable('Users')
            ->find()
            ->select([
                'id',
                'username',
            ])
            ->all();


        $this->viewBuilder()
            ->setClassName('Json')
            ->setOption('serialize', 'users');

        $this->set([
            'users' => $users,
        ]);
    }

    public function register()
    {
        $users = $this->fetchTable('Users');

        if ($this->request->is('post')) {
            $user = $users->newEntity(
                $this->request->getData()
            );

            if ($users->save($user)) {
                $this->Flash->success('Account created successfully.');

                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'login',
                ]);
            }

            $this->Flash->error('Unable to create your account.');
        }
    }

    public function login()
    {
        $users = $this->fetchTable('Users');

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $user = $users
                ->find()
                ->where([
                    'username' => $data['username'],
                ])
                ->first();

            if ($user && $user->password === $data['password']) {
                $this->request->getSession()->write('Auth.user', [
                    'id' => $user->id,
                    'username' => $user->username,
                ]);


                return $this->redirect('/');
            }

            $this->Flash->error('Invalid username or password.');
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth.user');

        return $this->redirect('/');
    }

    public function profile(string $username)
    {
        $authUser = $this->request->getSession()->read('Auth.user');

        if (!$authUser) {
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login',
            ]);
        }

        $users = $this->fetchTable('Users');

        $user = $users
            ->find()
            ->where([
                'Users.username' => $username,
            ])
            ->first();

        if (!$user) {
            throw new \Cake\Http\Exception\NotFoundException(
                'User not found'
            );
        }

        $reviews = $this->fetchTable('Reviews')
            ->find()
            ->where([
                'Reviews.user_id' => $user->id,
            ])
            ->contain([
                'Movies',
            ])
            ->orderBy([
                'Reviews.id' => 'DESC',
            ])
            ->all();

        $this->set([
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }
}
