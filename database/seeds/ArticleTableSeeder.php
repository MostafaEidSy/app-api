<?php

use App\Models\Admin;
use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fac = Factory::create();
        $id = Admin::where('id', 1)->first();
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->title,
            'category_id'       => \App\Models\Category::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->title,
            'sub_category_id'   => \App\Models\SubCategories::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->title,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->paragraph(4),
            'content'           => $fac->paragraph,
            'status'            => 0,
            'slug'              => $fac->slug
        ]);
    }
}
