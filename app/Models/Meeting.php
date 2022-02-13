<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['meeting', 'goals'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function videos()
    {
        return $this->embedsMany(Video::class);
    }

    public function modules()
    {
        return $this->embedsMany(Module::class);
    }

    public function tasks()
    {
        return $this->embedsMany(Module::class);
    }

    public function assignments()
    {
        return $this->embedsMany(Assignment::class);
    }
}
