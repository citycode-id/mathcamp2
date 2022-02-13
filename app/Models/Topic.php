<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'points', 'references', 'meetings', 'current_meeting'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
