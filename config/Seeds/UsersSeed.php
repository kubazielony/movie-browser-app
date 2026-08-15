<?php

declare(strict_types=1);

use Migrations\BaseSeed;

class UsersSeed extends BaseSeed
{
    public function run(): void
    {
        $data = [
            [
                'username' => 'kuba',
                'password' => 'password123',
            ],
            [
                'username' => 'admin',
                'password' => 'admin123',
            ],
            [
                'username' => 'test',
                'password' => 'test123',
            ],
        ];

        $this->table('users')->insert($data)->save();
    }
}
