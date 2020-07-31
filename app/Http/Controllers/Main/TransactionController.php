<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Ongkir;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use DateTime;

class TransactionController extends CustomController
{
    //
    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function addToCart()
    {
        try {
            $data = [
                'user_id' => auth()->id(),
                'harga' => $this->postField('harga'),
                'qty' => $this->postField('qty'),
                'product_id' => $this->postField('id'),
                'detail' => $this->postField('detail'),
                'tipe' => $this->postField('tipe')
            ];
            $this->insert(Carts::class, $data);
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }

    public function cartPage()
    {
        $carts = Carts::with('product')->where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->get();
        $ongkir = Ongkir::all();
        $subTotal = $carts->sum(function ($v) {
            return ($v->harga * $v->qty);
        });
//        return $carts->toArray();
        return view('cart')->with(['carts' => $carts, 'subTotal' => $subTotal, 'ongkir' => $ongkir]);
    }

    public function getOngkir()
    {
        try {
            $id = $this->field('id');
            $voucher = Ongkir::where('id', '=', $id)->first();
            return $this->jsonResponse($voucher, 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }

    public function cekOut()
    {
        try {
            $data = [
                'no_transaksi' => 'TR-' . \date('YmdHis'),
                'ongkir' => $this->postField('ongkir'),
                'nominal' => $this->postField('nominal'),
                'status' => '0',
            ];
            $transactions = $this->insert(Transaction::class, $data);
            Carts::where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->update(['transactions_id' => $transactions->id]);
            return $this->jsonResponse($transactions->id, 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }


    public function pagePayment($id)
    {
        $vendors = Vendor::all();
        $transaction = Transaction::with('cart.product')->whereHas('cart', function (Builder $query) {
            $query->where('user_id', '=', auth()->id());
        })->where('id', '=', $id)->firstOrFail();
        return view('payment')->with(['transaction' => $transaction, 'vendors' => $vendors]);
    }

    public function send()
    {
        $image = $this->generateImageName('gambar');
        $data = [
            'transactions_id' => $this->postField('id'),
            'vendors_id' => $this->postField('bank'),
            'user_id' => auth()->id(),
            'url' => $image,
            'description' => '',
            'status' => '0',
        ];

        $this->uploadImage('gambar', $image, 'bukti');
        $this->insert(Payment::class, $data);
        return redirect('/');
    }

    public function pageTransaksi()
    {
        $transaction = Transaction::with(['cart', 'payment'])->whereHas('cart', function (Builder $query){
            $query->where('user_id', '=', auth()->id());
        })->get();
        return view('user.pesanan.pesanan')->with(['transaction' => $transaction]);
    }

    public function detailHistory($id)
    {
        $trans = Transaction::with('cart.product')->where('id', '=', $id)->firstOrFail();
        return view('user.pesanan.detailPesanan')->with(['trans' => $trans]);
    }
}
