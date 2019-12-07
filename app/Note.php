<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //

    // Define relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
