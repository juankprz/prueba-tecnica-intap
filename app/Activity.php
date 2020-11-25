<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'description','user_id'
    ];

    public function times()
    {
        return $this->hasMany(Time::class,'activity_id','id');
    }

}
