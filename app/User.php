<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'address',
        'phone_number', 'gender', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts() {
        return $this->hasMany('App\Cart');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

        // public function user() {
        //     return $this->belongsTo('App\User', 'user_id', 'id');
        // }

    public function shoe() {
        return $this->hasMany('App\Shoes');
    }
}
