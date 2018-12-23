<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    public function user()
    {
    	return $this->belongsTo('App/User', 'user_id', 'id');
    }
    public function tour()
    {
    	return $this->belongsTo('App/Tour', 'tour_id', 'id');
    }
}
