<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pause_mayducdong extends Model
{
    protected $table = "pause_mayducdong";

    //
    public function employees()
    {
    	return $this->belongsTo('App\Employees','idEmployee','id');
    }
}
