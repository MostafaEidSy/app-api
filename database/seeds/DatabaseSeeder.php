<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ThreadTableSeeder::class);
        $this->call(DetailsThreadTableSeeder::class);
        $this->call(ExpertTableSeeder::class);
    }
}
