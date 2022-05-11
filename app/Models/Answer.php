<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'group', 'individual'];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
