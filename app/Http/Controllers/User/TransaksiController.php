<?php

namespace App\Http\Controllers\User;

use App\Helper\CustomController;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Arr;

/**
 * Class TransaksiController
 * @package App\Http\Controllers\Admin
 */
class TransaksiController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $user = auth()->user()->id;
        $transaksi = Transaction::where('user_id',$user)->with(['lastPayment','cart.product'])->get();
//        return $transaksi->toArray();
        return view('user.pesanan.pesanan')->with(['produk' => $transaksi]);
    }

    public function detail($id){
        $transaksi = Transaction::where('id', $id)->with(['payment.vendor','cart.product'])->first();
//        return $transaksi->toArray();
        return view('user.pesanan.detailPesanan')->with(['transaksi' => $transaksi]);
    }
}
