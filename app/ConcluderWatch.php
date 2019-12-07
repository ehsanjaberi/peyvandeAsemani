<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcluderWatch extends Model
{
    public $timestamps = false;

    // Define relationships
    public function concluder()
    {
        return $this->hasOne('App\Concluder','national_code','national_code');
    }
}
