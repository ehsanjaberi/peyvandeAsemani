<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelperWatch extends Model
{
    public $timestamps = false;
    // Define relationships
    public function Helper()
    {
        return $this->hasOne('App\Helper','national_code','national_code');
    }
}
