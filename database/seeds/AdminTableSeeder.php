<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::create([
            'name'          => 'Mostafa Eid',
            'email'         => 'lost.mostafa91@gmail.com',
            'password'      => bcrypt('123123123'),
        ]);
        $admin = Admin::create([
            'name'          => 'Mostafa Eid',
            'email'         => 'lost.mostafa94@gmail.com',
            'password'      => bcrypt('123123123'),
        ]);
    }
}
