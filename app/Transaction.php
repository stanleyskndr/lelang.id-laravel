<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user() {
        return $this->belongsTo('App\Transaction', 'user_id', 'id');
    }

    public function userDetail() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function transactionDetails() {
        return $this->hasMany('App\TransactionDetail', 'transaction_id', 'id');
    }
}
