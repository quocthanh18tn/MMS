<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production_mayducdong extends Model
{
    protected $table = "production_mayducdong";
    //
    public function employees()
    {
    	return $this->belongsTo('App\Employees','idEmployee','id');
    }
}
