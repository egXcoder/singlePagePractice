<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];
    protected $with = ['author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author(){
        return $this->belongsTo(\App\User::class,'user_id');
    }
    public function getCreatedAtAttribute($date){
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
