@extends('admin.base')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: 'Berhasil Merubah Data',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <!-- Header -->
    <div class="header bg-translucent-dark pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Data Produk</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/admin/produk">Data Produk</a></li>
                                <li class="breadcrumb-item"><a href="#">Edit Data</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <input id="id" name="id" value="{{$produk->id}}" hidden>
                            <h6 class="heading-small text-muted mb-4">Data</h6>
                            <div class="pl-lg-4">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nama">Nama Produk</label>
                                            <input type="text" required id="nama" name="nama" value="{{$produk->nama}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            @forelse($kategori as $k)
                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="satuan">Satuan</label>
                                        <select class="form-control" id="satuan" name="satuan">
                                            <option value="pcs">Pcs</option>
                                            <option value="lusin">Lusin</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" required id="harga" name="harga" value="{{$produk->harga}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="diskon">Diskon</label>
                                            <input type="number" required id="diskon" name="diskon" value="{{$produk->diskon}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="promo">Promo</label>
                                        <select class="form-control" id="promo" name="promo">
                                            <option value="ya">Ya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" required id="deskripsi" name="deskripsi" value="{{$produk->deskripsi}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <img src="{{asset('uploads/image')}}/{{$produk->url}}" height="200">
                                    </div>

                                    <div class="col-lg-6">
                                        <a>Gambar</a>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar"
                                                   name="gambar" lang="en">
                                            <label class="custom-file-label" for="gambar">Select file</label>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <hr class="my-4"/>
                            <!-- Description -->
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#satuan').val('{{$produk->satuan}}');
        $('#kategori').val('{{$produk->kategori_id}}');
        $('#satuan').formSelect();
        $('#kategori').formSelect();
    });
</script>

@endsection
