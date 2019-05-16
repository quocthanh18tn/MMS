<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    protected $table = "columns";

    public function panels()
    {
    	return $this->belongsTo('App\Panels','idPanel','id');
    }    //

    public function irregulartask()
    {
    	return $this->hasMany('App\Irregulartask','idColumn','id');
    }

    public function pausetask()
    {
    	return $this->hasMany('App\Pausetask','idColumn','id');
    }

    public function overtimetask()
    {
    	return $this->hasMany('App\Overtimetask','idColumn','id');
    }
    public function production_main()
    {
    	return $this->hasMany('App\Production_main','idColumn','id');
    }
}
