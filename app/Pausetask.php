<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pausetask extends Model
{
    protected $table = "pausetask";
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
}
