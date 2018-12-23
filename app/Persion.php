<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persion extends Model
{
    protected $guarded = ['id'];
    public function tour()
    {
    	return $this->belongsTo('App/Tour', 'tour_id', 'id');
    }
}
