@extends('navbar')
@section('content')


    <section class="container mt-5 mb-5">


        <div class="text-left mt-5">
            <h2><i class="mr-3" data-feather="shopping-cart"></i>Cart</h2>
            <div class="d-block bg-gradient-red mb-2" style="height: 3px; width: 300px; margin-top: 20px">
            </div>
        </div>



        <div class="card">

            <!-- Light table -->
            <div class="table-responsive">
                <table id="tabel" class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort text-center" data-sort="name">#</th>
                        <th scope="col" class="sort text-center" data-sort="completion">gambar</th>
                        <th scope="col" class="sort text-center" data-sort="budget">Nama Produk</th>
                        <th scope="col" class="sort text-center" data-sort="budget">Qty</th>
                        <th scope="col" class="sort text-center" data-sort="completion">satuan</th>
                        <th scope="col" class="sort text-center" data-sort="completion">Deskripsi</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    {{--                    @foreach($produk as $p)--}}
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="{{asset('assets/img/ex/1.jpg')}}"
                                                     style="height: 100px; width: 100px; object-fit: cover"></td>
                        <td class="text-center">Jesrey Persis Solo</td>
                        <td class="text-center"> 3</td>
                        <td class="text-center"> pcs</td>
                        <td class="text-center">Rofiq(24), topil(21), bambang(3)</td>

                    </tr>
                    {{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>

            <div class="col-12">
                <div class="text-left mt-5">
                    <h2><i class="mr-3" data-feather="twitch"></i>Total Harga & Pengiriman</h2>
                    <div class="d-block bg-gradient-red mb-2" style="height: 3px; width: 300px; margin-top: 20px">
                    </div>
                </div>



                <div class="col-lg-12">
                    <div class="card p-3">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label  for="nama">Sub Total</label>
                                <input type="text" readonly id="nama" name="nama"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="url">Diskon</label>
                                <input type="number" readonly id="harga" name="harga"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="harga">Total</label>
                                <input type="number" readonly id="harga" name="harga"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="satuan">Kota</label>
                            <select class="form-control" id="kota" name="kota">
                                <option value="solo">Solo</option>
                                <option value="sukoharjo">Sukoharjo</option>
                            </select>
                        </div>

                        <div class="col-lg-2 mt-auto mb-auto ml-auto">
                            <a href="/admin/transaksi/cetak" class="btn btn-md btn-danger">Check Out</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')


@endsection
