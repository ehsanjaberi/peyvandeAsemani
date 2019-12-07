<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    // Define relationships
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
