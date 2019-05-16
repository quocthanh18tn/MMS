<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime_mayducdong extends Model
{
    protected $table = "overtime_mayducdong";

    //
    public function employees()
    {
    	return $this->belongsTo('App\Employees','idEmployee','id');
    }
}
