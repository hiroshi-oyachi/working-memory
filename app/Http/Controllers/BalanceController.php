<?php

namespace App\Http\Controllers;

use app\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Balance;
use App\Models\BalanceHistory;
use Carbon\Carbon;

class BalanceController extends Controller
{
    //
    public function add()
    {
        return view('balance.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Balance::$rules);
        
        $balance = new Balance;
        $form = $request->all();
        
        $balance->fill($form);
        $balance->save();
        
        return redirect('balance/create');
    }
    
    public function index(Request $request)
    {
        $cond_year = $request->cond_year;
        if($cond_year !='') {
            $posts = Balance::where('year', $cond_year)->get();
        } else {
            $posts = balance::all();
        }
        
        $cond_balance_type =$request->cond_balance_type;
        if($cond_balance_type !='') {
            $posts = Balance::where('balance_type', $cond_balance_type)->get();
        } else {
            $posts = Balance::all();
        }
        return view('balance.index', ['posts' => $posts, 'cond_year' => $cond_year, 'cond_balance_type' => $cond_balance_type]);
    }
    
    public function edit(Request $request)
    {
        $balance = Balance::find($request->id);
        if (empty($balance)) {
            abort(404);
        }
        return view('balance.edit', ['balance_form' => $balance]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Balance::$rules);
        $balance = Balance::find($request->id);
        $balance_form = $request->all();
        unset($balance_form['_token']);
        
        $balance->fill($balance_form)->save();
        
        $history = new BalanceHistory();
        $history->balance_id = $balance->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('balance');
    }
    
    public function delete(Request $request)
    {
        $balance = Balance::find($request->id);
        $balance->delete();
        
        return redirect('balance/');
    }
    
    public function graph(Request $request)
    {
        $year = date('Y');
        $startyear = date('Y', strtotime('-5 year'));
        
                
        return view('balance.graph',['year' => $year, 'startyear' => $startyear]);
    }
    
    public function year($year)
    {
        $balances = DB::table('balances')
                      ->select('month', 'balance_type', DB::raw('SUM(price) as total_price') )
                      ->where('year', $year)
                      ->groupByraw('year, month, balance_type')
                      ->get();
                      var_dump($balances->toArray());
                      
      return response()->json(['income' => [30, 40, 50, 100, 20], 'expense' => [30, 50, 70, 90, 70]]);
    }
}
