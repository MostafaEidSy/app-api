<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subCategory(){
        return $this->hasMany(SubCategories::class, 'parent', 'id');
    }
    public function posts(){
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
