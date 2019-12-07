<?php

namespace App\Http\Controllers\Panel\Station;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Station;
use Exception;

class StationController extends Controller
{
    public function show()
    {
        $stations = Station::all();
        return view('panel.station.station')->with('stations', $stations);
    }
    public function insert(Request $request)
    {
        $newStation = new Station();
        try
        {
            $newStation->station_name = $request->station_name;
            $newStation->save();
            return redirect()->route('show-station');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        Station::destroy($id);
        return redirect()->route('show-station');
    }
    public function fetch($id)
    {
        $wantedRecord = Station::find($id);
        return $wantedRecord;
    }
    public function update(Request $request)
    {
        try
        {
            $record = Station::find($request->id);
            $record->where('id', $request->id)->update(['station_name'=>$request->station_name]);
            $record->save();
            return redirect()->route('show-station');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
