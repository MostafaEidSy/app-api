<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsThread extends Model
{
    protected $guarded = [];

    public function thread(){
        return $this->belongsTo(Thread::class, 'thread_id', 'id');
    }
}
