<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    public function lastPayment(){
        return $this->hasMany(Payment::class,'transactions_id')->latest('id');
    }

    public function payment(){
        return $this->hasMany(Payment::class,'transactions_id');
    }

    public function cart(){
        return $this->hasMany(Carts::class, 'transactions_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
