<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id'];
    public function tour()
    {
    	return $this->belongsTo('App/Tour', 'tour_id', 'id');
    }
}
