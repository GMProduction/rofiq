<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Ongkir;

class OngkirController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $ongkir = Ongkir::all();
        return view('admin.ongkir.ongkir')->with(['ongkir' => $ongkir]);
    }

    public function addForm(){
        if($this->request->isMethod('POST')){
            $data = [
                'kota' => $this->postField('namakota'),
                'harga' => $this->postField('biaya'),
            ];
            $this->insert(Ongkir::class, $data);
            return redirect()->back()->with(['success' => 'success']);
        }
        return view('admin.ongkir.tambahongkir');
    }

    public function editForm($id){
        if($this->request->isMethod('POST')){
            $data = [
                'kota' => $this->postField('namakota'),
                'harga' => $this->postField('biaya'),
            ];
            $this->update(Ongkir::class, $data);
            return redirect()->back()->with(['success' => 'success']);
        }
        $ongkir = Ongkir::where('id',$id)->first();
        return view('admin.ongkir.editongkir')->with(['ongkir' => $ongkir]);
    }

}
