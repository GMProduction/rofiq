<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function adminDataPesanan(Request $request)
    {
        $fawal = DateTime::createFromFormat('m/d/Y', $request->get('awal'));
        $fakhir = DateTime::createFromFormat('m/d/Y', $request->get('akhir'));
        $awal = $fawal->format('Y-m-d');
        $akhir = $fakhir->format('Y-m-d');
        $transaksi = Transaction::whereBetween('created_at',[$awal,$akhir])->with(['lastPayment','cart.product','user'])->get();

        return view('admin.pesanan.cetak')->with(['transaksi' => $transaksi]);
    }

    public function cetakAdminDataPesanan(Request $request)
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->adminDataPesanan($request))->setPaper('b4', 'landscape');
        return $pdf->stream();
//        return $this->adminDataPesanan($request);
    }


}
