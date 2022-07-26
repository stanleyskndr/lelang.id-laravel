<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public function transaction() {
        return $this->belongsTo('App\Transaction', 'id', 'transaction_id');
    }

    public function shoes() {
        return $this->hasOne('App\Shoes', 'id', 'shoe_id');
    }
}
