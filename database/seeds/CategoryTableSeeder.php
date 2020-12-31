<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name'          => 'GRUNDLAGEN',
            'slug'          => 'grundlagen',
        ]);
        $category = Category::create([
            'name'          => 'GESCHÄFTSMODELLE',
            'slug'          => 'geschaftsmodelle',
        ]);
        $category = Category::create([
            'name'          => 'AUS DER PRAXIS',
            'slug'          => 'aus-der-praxis',
        ]);
        $category = Category::create([
            'name'          => 'KUNDENAKQUISE',
            'slug'          => 'kundenakquise',
        ]);
        $category = Category::create([
            'name'          => 'WACHSTUM',
            'slug'          => 'wachstum',
        ]);
        $category = Category::create([
            'name'          => 'TOOLS',
            'slug'          => 'tools',
        ]);
    }
}
