<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];
    public function tour()
    {
    	return $this->belongsToMany('App/Tour', 'tours_locations', 'tour_id', 'location_id');
    }
}
