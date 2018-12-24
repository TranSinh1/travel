<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
    	return $this->hasMany('App/Tour', 'organisation_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App/User', 'organisation_id', 'id');
    }
    
}
