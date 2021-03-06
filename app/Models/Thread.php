<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function details(){
        return $this->hasMany(DetailsThread::class, 'thread_id', 'id');
    }
}
