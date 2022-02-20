<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Step extends Model
{
  protected $fillable = ['meeting_id', 'last_step'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
