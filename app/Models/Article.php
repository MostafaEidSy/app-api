<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategories::class, 'sub_category_id', 'id');
    }
}
