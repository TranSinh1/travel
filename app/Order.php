<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    public function cartTour()
    {
    	return $this->belongsTo('App/CartTour', 'order_id', 'id');
    }
    public function user() 
    {
    	return $this->belongsTo('App/User', 'user_id', 'id');
    }
    public function paymethod()
    {
    	return $this->belongsTo('App/Paymethod', 'paymethod_id', 'id');
    }
}
