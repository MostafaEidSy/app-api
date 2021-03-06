<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
