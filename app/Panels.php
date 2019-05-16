<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panels extends Model
{
    protected $table = "panels";

    public function panel_type()
    {
    	return $this->belongsTo('App\Panel_type','idPaneltype','id');
    }    //
      public function columns()
    {
    	return $this->hasMany('App\Columns','idPanel','id');
    }
     public function projects()
    {
    	return $this->belongsTo('App\Projects','idProject','id');
    }    //
}
