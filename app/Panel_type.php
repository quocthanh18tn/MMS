<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panel_type extends Model
{
	 protected $table = "paneltype";

    public function panels()
    {
    	return $this->hasMany('App\Panels','idPaneltype','id');
    }    //
    //
}
