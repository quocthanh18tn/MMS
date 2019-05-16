<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production_main extends Model
{   
	protected $table = "production_main";
    //
    public function columns()
    {
    	return $this->belongsTo('App\Columns','idColumn','id');
    }
    public function stage()
    {
    	return $this->belongsTo('App\Stage','idStage','id');
    }  
    public function employees()
    {
    	return $this->belongsTo('App\Employees','idEmployee','id');
    }
    //
}
