<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";

    public function projects()
    {
    	return $this->belongsTo('App\Projects','idProject','id');
    }    //
    public function customers()
    {
    	return $this->belongsTo('App\Customers','idCustomer','id');
    }    //
}
