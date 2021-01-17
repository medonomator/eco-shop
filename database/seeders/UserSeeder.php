<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'a@a.ru',
                'password' => bcrypt(12345678),
            ],
            [
                'name' => 'Alisa',
                'email' => 'b@b.ru',
                'password' => bcrypt(12345678),
            ],
            [
                'name' => 'MiroSlava',
                'email' => 'c@c.ru',
                'password' => bcrypt(12345678),
            ]
        ];
        \DB::table('users')->insert($data);
    }
}
