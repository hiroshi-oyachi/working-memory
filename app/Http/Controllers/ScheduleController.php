<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\ScheduleHistory;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //
    public function add()
    {
        return view('schedule.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        
        $schedule = new Schedule;
        $form = $request->all();
        
        $schedule->fill($form);
        $schedule->save();
        
        return redirect('schedule/create');
    }
    
    public function index(Request $request)
    {
        $cond_work_detail = $request->cond_work_detail;
        if($cond_work_detail !='') {
            $posts = Schedule::where('work_detail', $cond_work_detail)->get();
        } else {
            $posts = Schedule::all();
        }
        return view('schedule.index', ['posts' => $posts, 'cond_work_detail' => $cond_work_detail]);
    }
    
    public function edit(Request $request)
    {
        $schedule = Schedule::find($request->id);
        if (empty($schedule)) {
            abort(404);
        }
        return view('schedule.edit', ['schedule_form' => $schedule]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        $schedule = Schedule::find($request->id);
        $schedule_form = $request->all();
        unset($schedule_form['_token']);
        
        $schedule->fill($schedule_form)->save();
        
        $history = new ScheduleHistory();
        $history->schedule_id = $schedule->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('schedule');
    }
    
    public function delete(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        
        return redirect('schedule/');
    }
}
