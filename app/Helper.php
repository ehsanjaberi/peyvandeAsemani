<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'national_code';
    public $timestamps = false;
    protected $fillable = ['national_code','first_name','last_name','mobile','help_type','working_day','watch_time'];

    // Define relationships
    public function helperType()
    {
        return $this->belongsTo('App\HelperType','help_type','id');
    }
    public function week_day()
    {
        return $this->belongsTo('App\WeekDay','working_day','id');
    }
}
