<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Carts;
use App\Models\Ongkir;
use Illuminate\Http\Request;

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
}
