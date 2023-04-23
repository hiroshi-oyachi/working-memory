<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'work_date' => 'required',
        'work_detail' => 'required',
        'start_hour' => 'required',
        'start_minutes' => 'required',
        'end_hour' => 'required',
        'end_minutes' => 'required',
        );
        
        public function histories()
        {
            return $this->hasMany('App\Models\ScheduleHistory');
        }
}
