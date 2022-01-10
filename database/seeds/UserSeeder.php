<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Angel Paredes Torres',
            'email' => 'cheloparedestorres@gmail.com',
            'password' => Hash::make('The&Control3d15_'),
            'img_profile' => 'default.jpg',
        ]);
    }
}
