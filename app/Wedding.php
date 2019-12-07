<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    //

    // Define relationships
    public function husband()
    {
        return $this->belongsTo('App\Husband','husband_national_code','national_code');
    }
    public function wife()
    {
        return $this->belongsTo('App\Wife','wife_national_code','national_code');
    }
    public function concluder()
    {
        return $this->belongsTo('App\Concluder','concluder_national_code','national_code');
    }
    public function station()
    {
        return $this->belongsTo('App\Station');
    }
}
