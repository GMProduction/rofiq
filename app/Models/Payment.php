<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';

    //
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendors_id');
    }


}
