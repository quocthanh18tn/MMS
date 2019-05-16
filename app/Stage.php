<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
        protected $table = "stage";

    public function irregulartask()
    {
    	return $this->hasMany('App\Irregulartask','idStage','id');
    }

    public function pausetask()
    {
    	return $this->hasMany('App\Pausetask','idStage','id');
    }

    public function overtimetask()
    {
    	return $this->hasMany('App\Overtimetask','idStage','id');
    }
    public function production_main()
    {
    	return $this->hasMany('App\Production_main','idStage','id');
    }
}
