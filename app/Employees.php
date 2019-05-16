<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
        protected $table = "employees";
     protected $primaryKey = 'idEmployee';

    public function irregulartask()
    {
    	return $this->hasMany('App\Irregulartask','idEmployee','id');
    }

    public function pausetask()
    {
    	return $this->hasMany('App\Pausetask','idEmployee','id');
    }

    public function overtimetask()
    {
    	return $this->hasMany('App\Overtimetask','idEmployee','id');
    }
    public function production_main()
    {
    	return $this->hasMany('App\Production_main','idEmployee','id');
    }   
    public function production_mayducdong()
    {
    	return $this->hasMany('App\Production_mayducdong','idEmployee','id');
    }  
    public function production_maybenddong()
    {
    	return $this->hasMany('App\Production_maybenddong','idEmployee','id');
    }
}