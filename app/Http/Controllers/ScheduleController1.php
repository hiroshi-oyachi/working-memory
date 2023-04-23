<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule;

class ScheduleController1 extends Controller
{
    public function index(Request $request)
    {
        $posts = Schedule::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('schedule.index', ['headline' => $headline, 'posts' => $posts]);
        
    }
    //
}
