<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'url'];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
