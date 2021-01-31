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
            'name'              => $fac->name,
            'category_id'       => \App\Models\Category::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '1.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'sub_category_id'   => \App\Models\SubCategories::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '2.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '3.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'status'            => 0,
            'slug'              => $fac->slug,
            'image_mobile'      => '4.png'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'category_id'       => \App\Models\Category::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '5.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'sub_category_id'   => \App\Models\SubCategories::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '6.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '7.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'status'            => 0,
            'slug'              => $fac->slug,
            'image_mobile'      => '8.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'category_id'       => \App\Models\Category::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '9.jpeg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'sub_category_id'   => \App\Models\SubCategories::where('id', '1')->first()->id,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '10.png'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
            'image_mobile'      => '11.jpg'
        ]);
        $post = Article::create([
            'admin_id'          => $id->id,
            'name'              => $fac->name,
            'content'           => $fac->paragraph,
            'status'            => 0,
            'slug'              => $fac->slug,
            'image_mobile'      => '12.jpeg'
        ]);
    }
}
