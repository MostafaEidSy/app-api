<?php

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $sub = SubCategories::create([
            'parent'            => $categories[0]->id,
            'name'              => 'MINDSET',
            'slug'              => 'mindset',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[1]->id,
            'name'              => 'SMMA',
            'slug'              => 'smma',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[1]->id,
            'name'              => 'AMAZON',
            'slug'              => 'amazon',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[2]->id,
            'name'              => 'OM-AGENTUR',
            'slug'              => 'om-agentur',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[3]->id,
            'name'              => 'DIREKTANSPRACHE',
            'slug'              => 'direktansprache',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[3]->id,
            'name'              => 'LIVE-BERATUNGEN',
            'slug'              => 'live-beratungen',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[4]->id,
            'name'              => 'POSITIONIERUNG',
            'slug'              => 'positionierung',
        ]);
        $sub = SubCategories::create([
            'parent'            => $categories[5]->id,
            'name'              => 'FOTO & VIDEO',
            'slug'              => 'foto-video',
        ]);
    }
}
