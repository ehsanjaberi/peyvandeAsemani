<?php

namespace App\Http\Controllers\Panel\Wedding;

use App\ConcluderWatch;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;
use App\Wedding;
use App\Husband;
use App\Wife;
use App\City;
Use App\Study;
use App\Station;
use App\Concluder;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

class WeddingController extends Controller
{
    public function show()
    {
        $dateTime = Verta::now();
        $time = $dateTime->hour.':'.$dateTime->minute.':'.$dateTime->second;
        $date = $dateTime->year.'/'.$dateTime->month.'/'.$dateTime->day;
        $studies = Study::all();
        $states = State::all();
//

    }
    public function insert(Request $request)
    {
        return 0;
    }
    public function getCities($state_id)
    {
        $cities = DB::table('cities')->where('state_id', $state_id)->pluck('name','id');
        return response()->json($cities);
    }
}
