<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
    	return $this->belongsToMany('App/Tour', 'tours_transports', 'tour_id', 'transport_id');
    }
    
}
