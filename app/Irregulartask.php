<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Irregulartask extends Model
{
    protected $table = "irregulartask";
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
