<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];


    public function subscribable()
    {
        return $this->morphTo();
    }

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
