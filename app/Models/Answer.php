<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'type', 'file'];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
