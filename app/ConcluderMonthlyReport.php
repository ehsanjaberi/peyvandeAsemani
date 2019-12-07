<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcluderMonthlyReport extends Model
{
    public $timestamps = false;
    protected $fillable = ['national_code','present_count_per_month','this_month_weddings','comments_count','total_hours','from','to'];

    // Define relationships
    public function concluder()
    {
        return $this->belongsTo('App\Concluder','national_code','national_code');
    }
}
