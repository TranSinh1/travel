<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function organisation()
    {
        return $this->hasMany('App\Organisation', 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }

    //check is admin
    public function scopeIsAdmin($query, $user)
    {
        if (isset($user->role_id)) {
            $check = $user->role_id == Role::where('name', config('user.user.is_admin'))->first()->id ? true : false;

            return json_encode($check);
        }

    }

    //check user is block
    public function scopeIsBlock($query, $user)
    {
        if (isset($user->role_id)) {
            $check = $user->role_id == Role::where('name', config('user.user.is_block'))->first()->id ? true : false;
            
            return json_encode($check);
        }


    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
