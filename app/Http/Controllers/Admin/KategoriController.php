<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Kategori;

/**
 * Class KategoriController
 * @package App\Http\Controllers\Admin
 */
class KategoriController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $kategori = Kategori::all();
        return view('admin.kategori.kategori')->with(['kategori' => $kategori]);
    }

    public function addForm(){
        if ($this->request->isMethod('POST')){
            $data = [
              'nama' => $this->postField('nama')
            ];
            $this->insert(Kategori::class, $data);
            return redirect()->back()->with(['success' => 'success']);
        }
        return view('admin.kategori.tambahkategori');
    }

    public function editForm($id){
        $kategori = Kategori::where('id', $id)->first();
        if ($this->request->isMethod('POST')){
            $data = [
                'nama' => $this->postField('nama')
            ];
            $this->update(Kategori::class, $data);
            return redirect()->back()->with(['success' => 'success']);
        }
        return view('admin.kategori.editkategori')->with(['kategori' => $kategori]);
    }


}
