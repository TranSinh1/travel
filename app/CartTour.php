<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartTour extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
    	return $this->belongsTo('App/Tour', 'tour_id', 'id');
    }

    public function order()
    {
    	return $this->hasMany('App/Order', 'order_id', 'id');
    }
    
}
