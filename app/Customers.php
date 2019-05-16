<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
         protected $table = "customers";

    public function orders()
    {
    	return $this->hasMany('App\Orders','idCustomer','id');
    }
    // table the loai co nhieu loai tin, khoa phu loai tin, khoa chinh id

}
