<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concluder extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'national_code';
    public $timestamps = false;
    protected $fillable = ['national_code','first_name','last_name','mobile','working_day'];

    // Define relationships
    public function week_day()
    {
        return $this->hasOne('App\WeekDay','working_day','id');
    }
}
