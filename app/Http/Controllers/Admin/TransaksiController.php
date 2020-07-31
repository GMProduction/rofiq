<?php

namespace App\Http\Controllers\Admin;

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
        $transaksi = Transaction::with(['lastPayment','cart.product','user'])->get();
//        return $transaksi->toArray();
        return view('admin.pesanan.pesanan')->with(['transaksi' => $transaksi]);
    }

    public function detail($id){
        $transaksi = Transaction::where('id', $id)->with(['user','payment.vendor','cart.product'])->first();

//        return $transaksi->toArray();
        if ($this->request->isMethod('POST')){
            $data = [
                'status' => $this->postField('status')
            ];
            if($this->request->get('action') == 'payment'){
                if($this->request->get('alasan') !== null){
                    $data = Arr::add($data,'description', $this->postField('alasan'));
                }
                $this->update(Payment::class, $data);
                return redirect()->back()->with(['success' => 'success']);
            }else{
                $this->update(Transaction::class, $data);
                return redirect()->back()->with(['success' => 'success']);
            }
        }
        return view('admin.pesanan.detailPesanan')->with(['transaksi' => $transaksi]);
    }
}
