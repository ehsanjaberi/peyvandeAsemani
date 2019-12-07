<?php

namespace App\Http\Controllers\Panel\Helper;

use App\HelperMonthlyReport;
use App\HelperWatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper;
use http\Exception;
use App\WeekDay;
use App\HelperType;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    public function show()
    {
        $helpers = Helper::all();
        $days = WeekDay::all();
        $helpersType = HelperType::all();
        for ($i = 0;$i < count($helpers); $i++)
        {
            for ($j = 0;$j < count($days);$j++)
            {
                if ($helpers[$i]->working_day == $days[$j]->id)
                {
                    $helpers[$i]->working_day = $days[$j]->name;
                    break;
                }
            }
            for ($k = 0;$k < count($helpersType);$k++)
            {
                if ($helpers[$i]->help_type == $helpersType[$k]->id)
                {
                    $helpers[$i]->help_type = $helpersType[$k]->title;
                    break;
                }
            }
        }
        return view('panel.helper.index')->with(['helpers' => $helpers, 'days' => $days, 'helpersType' => $helpersType]);
    }
    public function insertForm()
    {
        $weekDays = WeekDay::all();
        $helperTypes = HelperType::all();
        return view('panel.helper.insert')->with(['weekDays' => $weekDays,'helperTypes' => $helperTypes]);
    }
    public function insert(Request $request)
    {
        try
        {
            $newHelper = new Helper();
            $newHelperReport = new HelperMonthlyReport();
            // New Helper
            $newHelper->national_code = $request->national_code;
            $newHelper->first_name = $request->first_name;
            $newHelper->last_name = $request->last_name;
            $newHelper->mobile = $request->mobile;
            $newHelper->help_type = $request->help_type;
            $newHelper->working_day = $request->working_day;
            $newHelper->watch_time = $request->watch_time;
            // New Record for helpers report
            $newHelperReport->national_code = $request->national_code;
            $date = Verta::now();
            $newHelperReport->from = $date->year.'/'.$date->month.'/'.$date->day;
            $date = $date->addMonth();
            $newHelperReport->to = $date->year.'/'.$date->month.'/'.$date->day;
            $newHelper->save();
            $newHelperReport->save();
            return redirect()->route('show-helper');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function delete($national_code)
    {
        Helper::destroy($national_code);
        return redirect()->route('show-helper');
    }
    public function updateForm($national_code)
    {
        $user = Helper::find($national_code);
        $days = WeekDay::all();
        $helperTypes = HelperType::all();
        return view('panel.helper.update')->with(['user' => $user, 'weekDays' => $days, 'helperTypes' => $helperTypes]);
    }
    public function update(Request $request)
    {
        try
        {
            Helper::where('national_code',$request->national_code)
                    ->update($request->except(['_method', '_token']));
            return redirect()->route('show-helper');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function showRollcall()
    {
        $dateTime = Verta::now();
        $helpers = DB::table('helpers')->where('working_day', '=', ($dateTime->dayOfWeek) + 1)->get(['national_code', 'first_name', 'last_name', 'help_type', 'working_day', 'watch_time']);
        foreach ($helpers as $helper)
        {
            $helper->help_type = Helper::find($helper->national_code)->helperType->title;
            if (DB::table('helper_watches')->where([['national_code','=',$helper->national_code],['exit_time','=','00:00:00']])->value('id'))
                $helper->isReady = true;
            else
                $helper->isReady = false;
        }
        return view('panel.helper.rollcall')->with('helpers', $helpers);
    }
    public function present($national_code)
    {
        try
        {
            $dateTime = Verta::now();
            $time = $dateTime->hour.':'.$dateTime->minute.':'.$dateTime->second;
            $date = $dateTime->year.'/'.$dateTime->month.'/'.$dateTime->day;
            $helperWatch = new HelperWatch();
            $helperWatch->national_code = $national_code;
            $helperWatch->entrance_time = $time;
            $helperWatch->exit_time = '00:00:00';
            $helperWatch->date = $date;
            $helperWatch->save();
            return redirect()->route('show-helperRollcall');
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
            HelperWatch::where('national_code',$national_code)->update(['exit_time' => $time]);
            return redirect()->route('show-helperRollcall');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
