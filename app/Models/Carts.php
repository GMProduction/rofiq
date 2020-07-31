<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

}
