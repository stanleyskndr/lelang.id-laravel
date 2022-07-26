<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shoes() {
        return $this->hasOne('App\Shoes', 'id', 'shoe_id');
    }
}
