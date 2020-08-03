<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Kategori;
use App\Models\Products;
use Illuminate\Support\Arr;

class ProdukController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['produk'] = Products::all();

        return view('admin.produk.produk')->with($data);
    }

    public function addForm()
    {
        if ($this->request->isMethod('POST')) {
            $image = $this->generateImageName('gambar');
            $data  = [
                'nama'        => $this->postField('nama'),
                'satuan'      => $this->postField('satuan'),
                'harga'       => $this->postField('harga'),
//                'qty'         => $this->postField('deskripsi'),
                'diskon'      => $this->postField('diskon'),
//                'promo'      => $this->postField('promo'),
                'deskripsi'   => $this->postField('deskripsi'),
                'kategori_id' => $this->postField('kategori'),
                'url'         => $image,
            ];
            $this->uploadImage('gambar', $image, 'image');

            $this->insert(Products::class, $data);

            return redirect()->back()->with(['success' => 'success']);
        }

        $kategori = Kategori::all();
        return view('admin.produk.tambahproduk')->with(['kategori' => $kategori]);
    }

    public function editForm($id)
    {
        if ($this->request->isMethod('POST')) {
            $data  = [
                'nama'        => $this->postField('nama'),
                'satuan'      => $this->postField('satuan'),
                'harga'       => $this->postField('harga'),
//                'qty'         => $this->postField('deskripsi'),
                'diskon'      => $this->postField('diskon'),
//                'promo'      => $this->postField('promo'),
                'deskripsi'   => $this->postField('deskripsi'),
                'kategori_id' => $this->postField('kategori'),
            ];
            if ($this->request->hasFile('gambar')) {
                $image = $this->generateImageName('gambar');
                $data   = Arr::add($data, 'url', $image);
                $this->uploadImage('gambar', $image, 'image');
            }

            $this->update(Products::class, $data);

            return redirect()->back()->with(['success' => 'success']);
        }
        $produk = Products::where('id',$id)->with('kategori')->first();
        $kategori = Kategori::all();
        $data['produk'] = $produk;
        $data['kategori'] = $kategori;
        return view('admin.produk.editproduk')->with($data);
    }

}
