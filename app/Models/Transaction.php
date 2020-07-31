<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    public function cart()
    {
        return $this->hasMany(Carts::class, 'transactions_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transactions_id');
    }
}
