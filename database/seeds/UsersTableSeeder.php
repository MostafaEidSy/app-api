<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $user = User::create([
            'name'              => 'Mostafa Eid',
            'email'             => 'lost.mostafa91@gmail.com',
            'password'          => bcrypt('123123123'),
        ]);
        $user = User::create([
            'name'              => 'Ahmad Mostafa',
            'email'             => 'ahmad.mostafa@gmail.com',
            'password'          => bcrypt('123123123'),
        ]);
    }
}
