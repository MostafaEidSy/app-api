<?php

use App\Models\Admin;
use App\Models\Page;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        $fac = Factory::create();
        $id = Admin::where('id', 1)->first();
        $page = Page::create([
            'admin_id'          => $id->id,
            'name'              => $fac->word,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
        ]);
        $page = Page::create([
            'admin_id'          => $id->id,
            'name'              => $fac->word,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
        ]);
        $page = Page::create([
            'admin_id'          => $id->id,
            'name'              => $fac->word,
            'content'           => $fac->paragraph,
            'slug'              => $fac->slug,
        ]);
        $page = Page::create([
            'admin_id'          => $id->id,
            'name'              => $fac->word,
            'content'           => $fac->paragraph,
            'status'            => 0,
            'slug'              => $fac->slug,
        ]);
    }
}
