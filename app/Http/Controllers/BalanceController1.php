<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;

class BalanceController1 extends Controller
{
    public function index(Request $request)
    {
        $posts = Balance::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        return view('balance.index', ['headline' => $headline, 'posts' => $posts]);
    }
    //
}
