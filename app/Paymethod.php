<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
    	return $this->hasMany('App\Order', 'order_id', 'id');
    }
    
}
