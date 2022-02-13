<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['name', 'file'];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
