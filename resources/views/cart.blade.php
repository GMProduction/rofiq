@extends('navbar')
@section('content')


    <section class="container mt-5 mb-5">


        <div class="text-left mt-5">
            <h2><i class="mr-3" data-feather="shopping-cart"></i>Cart</h2>
        </div>

        <div class="d-block bg-gradient-blue mb-2" style="height: 3px; width: 300px; margin-top: 20px">

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
                        <th scope="col" class="sort text-center" data-sort="completion">Harga (hari)</th>
                        <th scope="col" class="sort text-center" data-sort="completion">Deskripsi</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    {{--                    @foreach($produk as $p)--}}
                    <tr>
                        <td class="text-center"><img src="https://cdn.mos.cms.futurecdn.net/7UKru4akuGz2QcUPp6smqX.jpg"
                                                     style="height: 100px; width: 100px; object-fit: cover"></td>
                        <td class="text-center">Kamera DSLR</td>
                        <td class="text-center"> 20</td>
                        <td class="text-center"> 2</td>
                        <td class="text-center">@rupiahPrefix(100000)</td>
                        <td class="text-center">Deskripsi</td>

                    </tr>
                    {{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>


        <div class="input-daterange datepicker row align-items-center">
            <div class="col-3 offset-4">
                <p class="mb-1 text-xs">Tanggal Sewa</p>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Start date" type="text" value="06/18/2020">
                    </div>
                </div>
            </div>
            <div class="col-3">
                <p class="mb-1 text-xs">Tanggal Kembali</p>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="End date" type="text" value="06/22/2020">
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mt-auto mb-auto ml-auto">
                <a href="/admin/transaksi/cetak" class="btn btn-md btn-primary">Check Out</a>
            </div>
        </div>


        <div class="row">
            <div class="col-6">
                <div class="text-left mt-5">
                    <h2><i class="mr-3" data-feather="twitch"></i>Input Voucher</h2>
                </div>

                <div class="d-block bg-gradient-blue mb-2" style="height: 3px; width: 300px; margin-top: 20px">

                </div>

                <div class="col-lg-12">
                    <div class="card p-3">

                        <div class="form-group">
                            <label for="voucher">Voucher</label>
                            <input type="text" required id="voucher" name="voucher"
                                   class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-8 text-right">
                                <p class="ml-auto mr-3">Voucher applied</p>
                            </div>
                            <div class="col-4 ">
                                <button type="submit" class="btn btn-lg btn-primary">Apply Voucher</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-6">
                <div class="text-left mt-5">
                    <h2><i class="mr-3" data-feather="twitch"></i>Total Harga</h2>
                </div>

                <div class="d-block bg-gradient-blue mb-2" style="height: 3px; width: 300px; margin-top: 20px">

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

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')


@endsection
