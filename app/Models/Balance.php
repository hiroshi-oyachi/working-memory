<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'year' => 'required',
        'month' => 'required',
        'detail' => 'required',
        'price' => 'required',
        'balance_type' => 'required',
        );
        
        public function histories()
        {
            return $this->hasMany('App\Models\BalanceHistory');
        }
}
