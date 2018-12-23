<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = ['id'];
    public function tour()
    {
    	return $this->belongsTo('App/Tour', 'tour_id', 'id');
    }
}
