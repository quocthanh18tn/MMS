<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //
     protected $table = "projects";

    public function orders()
    {
    	return $this->hasMany('App\Orders','idProject','id');
    }
    // table the loai co nhieu loai tin, khoa phu loai tin, khoa chinh id
    public function panels()
    {
    	return $this->hasMany('App\Panels','idProject','id');
    }
}
