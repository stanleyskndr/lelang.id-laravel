<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    public function carts() {
        return $this->belongsToMany('App\Cart', 'shoe_id', 'id');
    }

    public function shoe() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function transactionDetails() {
        return $this->belongsToMany('App\TransactionDetail', 'shoe_id', 'id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
