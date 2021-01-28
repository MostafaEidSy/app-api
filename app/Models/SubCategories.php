<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    public $table = 'sub_categories';
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class, 'parent', 'id');
    }
    public function posts(){
        return $this->hasMany(Article::class, 'sub_category_id', 'id');
    }
}
