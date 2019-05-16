<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production_maybenddong extends Model
{
    protected $table = "production_maybenddong";
    //
    public function employees()
    {
    	return $this->belongsTo('App\Employees','idEmployee','id');
    }
}
