<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = ['name', 'url'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
