<?php

namespace App\Http\Controllers\Panel\Concluder;

use App\ConcluderMonthlyReport;
use App\ConcluderWatch;
use App\Http\Controllers\Controller;
use App\WeekDay;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use http\Exception;
use App\Concluder;
use Illuminate\Support\Facades\DB;

class ConcluderController extends Controller
{
    public function show()
    {
        $concluders = Concluder::all();
        $days = WeekDay::all();
        for ($i = 0;$i < count($concluders);$i++)
        {
            for ($j = 0;$j < count($days);$j++)
            {
                if ($concluders[$i]->working_day == $days[$j]->id)
                {
                    $concluders[$i]->working_day = $days[$j]->name;
                    break;
                }
            }
        }
        return view('panel.concluder.index')->with('concluders', $concluders);
    }
    public function insertForm()
    {
        $days = WeekDay::all();
        return view('panel.concluder.insert')->with('days', $days);
    }
    public function insert(Request $request)
    {
        try
        {
            $newConcluder = new Concluder();
            $newConcluderReport = new ConcluderMonthlyReport();
            // New concluder
            $newConcluder->national_code = $request->national_code;
            $newConcluder->first_name = $request->first_name;
            $newConcluder->last_name = $request->last_name;
            $newConcluder->mobile = $request->mobile;
            $newConcluder->working_day = $request->working_day;
            // New record for concluder report
            $newConcluderReport->national_code = $request->national_code;
            $date = Verta::now();
            $newConcluderReport->from = $date->year.'/'.$date->month.'/'.$date->day;
            $date = $date->addMonth();
            $newConcluderReport->to = $date->year.'/'.$date->month.'/'.$date->day;
            $newConcluder->save();
            $newConcluderReport->save();
            return redirect()->route('show-concluder');
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }
    public function delete($national_code)
    {
        Concluder::destroy($national_code);
        return redirect()->route('show-concluder');
    }
    public function updateForm($national_code)
    {
        $user = Concluder::find($national_code);
        $weekDays = WeekDay::all();
        return view('panel.concluder.update')->with(['user' => $user, 'weekDays' => $weekDays]);
    }
    public function update(Request $request)
    {
        try
        {
            Concluder::where('national_code', $request->national_code)
                ->update($request->except(['_method','_token']));
            return redirect()->route('show-concluder');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function showRollcall()
    {
        $dateTime = Verta::now();
        $concluders = DB::table('concluders')->where('working_day','=',($dateTime->dayOfWeek + 1))->get(['national_code','first_name','last_name']);
        foreach ($concluders as $concluder)
        {
            if (DB::table('concluder_watches')->where([['national_code','=',$concluder->national_code],['exit_time','=','00:00:00']])->value('id'))
                $concluder->isReady = true;
            else
                $concluder->isReady = false;
        }
        return view('panel.concluder.rollcall')->with('concluders', $concluders);
    }
    public function present($national_code)
    {
        try
        {
            $dateTime = Verta::now();
            $time = $dateTime->hour.':'.$dateTime->minute.':'.$dateTime->second;
            $date = $dateTime->year.'/'.$dateTime->month.'/'.$dateTime->day;
            $concluderWatch = new ConcluderWatch();
            $concluderWatch->national_code = $national_code;
            $concluderWatch->entrance_time = $time;
            $concluderWatch->exit_time = '00:00:00';
            $concluderWatch->date = $date;
            $concluderWatch->save();
            return redirect()->route('show-concluderRollcall');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function absent($national_code)
    {
        try
        {
            $dateTime = Verta::now();
            $time = $dateTime->hour.':'.$dateTime->minute.':'.$dateTime->second;
            ConcluderWatch::where('national_code',$national_code)->update(['exit_time' => $time]);
            return redirect()->route('show-concluderRollcall');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
