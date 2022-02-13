<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['group'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
