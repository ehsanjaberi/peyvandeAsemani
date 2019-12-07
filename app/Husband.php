<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Husband extends Model
{
    //

    // Define relationships
    public function study()
    {
        return $this->hasOne('App\Study');
    }
    public function city()
    {
        return $this->hasOne('App\City');
    }
}
