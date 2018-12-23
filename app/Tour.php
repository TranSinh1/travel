<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = ['id'];
    public function organisation()
    {
    	return $this->belongsTo('App/Organisation', 'organisation_id','id');
    }
    public function location()
    {
    	return $this->belongsToMany('App/Location', 'tours_locations', 'tour_id', 'location_id');
    }
    public function person()
    {
    	return $this->hasMany('App/Person', 'tour_id', 'id');
    }
    public function transport()
    {
    	return $this->('App/Transport', 'tours_locations', 'tour_id', 'transport_id');
    }
    public function image()
    {
    	return $this->('App/Image', 'tour_id', 'id');
    }
    public function comment()
    {
    	return $this->hasMany('App/Comment', 'tour_id', 'id');
    }
    public function cartTour()
    {
    	return $this->hasMany('App/CartTour', 'tour_id', 'id');
    }
    public function sale()
    {
    	return $this->hasMany('App/Sale', 'tour_id', 'id');
    }
}
