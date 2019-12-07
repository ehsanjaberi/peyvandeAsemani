<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelperMonthlyReport extends Model
{
    public $timestamps = false;
    protected $fillable = ['national_code','total_working_time','total_waste_time','comments_count','from','to'];

    // Define relationships
    public function Helper()
    {
        return $this->belongsTo('App\Helper','national_code','national_code');
    }
}
