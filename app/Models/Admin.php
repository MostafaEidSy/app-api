<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
//    protected $gaurd = 'admin';
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Article::class, 'admin_id', 'id');
    }
    public function pages(){
        return $this->hasMany(Page::class, 'admin_id', 'id');
    }
}
