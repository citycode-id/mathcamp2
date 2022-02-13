<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Discussion extends Model
{

    protected $fillable = ['user_id','message'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
