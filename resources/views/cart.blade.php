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
                        <th scope="col" class="sort text-center" data-sort="completion">Harga</th>
                        <th scope="col" class="sort text-center" data-sort="completion">Total</th>
                        <th scope="col" class="sort text-center" data-sort="completion">Deskripsi</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($carts as $v)
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center"><img src="{{asset('/uploads/image')}} / {{ $v->product->url }}"
                                                         style="height: 100px; width: 100px; object-fit: cover"></td>
                            <td class="text-center">{{ $v->product->nama }}</td>
                            <td class="text-center"> {{ $v->qty }}</td>
                            <td class="text-center"> {{ $v->product->satuan }}</td>
                            <td class="text-center"> Rp {{ number_format($v->harga, 0, ',', '.') }}</td>
                            <td class="text-center"> Rp {{ number_format($v->harga * $v->qty, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $v->detail }}</td>

                        </tr>
                    @endforeach
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
                            <label for="nama">Sub Total</label>
                            <input type="text" readonly id="subtotal" name="subtotal"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label for="url">Ongkir</label>
                            <input type="number" readonly id="ongkir" name="ongkir"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="harga">Total</label>
                            <input type="number" readonly id="total" name="total"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="satuan">Kota</label>
                        <select class="form-control" id="kota" name="kota">
                            @foreach($ongkir as $v)
                                <option value="{{ $v->id }}">{{ $v->kota }} ( {{$v->harga}} )</option>
                            @endforeach
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


    <script>
        let subtotal = 0, ongkir = 0, total = 0;

        function hitungTotal() {
            subtotal = '{{ $subTotal }}';
            total = parseInt(ongkir) + parseInt(subtotal);
            $('#subtotal').val(subtotal);
            $('#ongkir').val(ongkir);
            $('#total').val(total);
        }

        $(document).ready(function () {
            hitungTotal();
            $('#kota').on('click', async function (e) {
                e.preventDefault();
                let code = $('#kota').val();
                let res = await $.get('/ajax/ongkir?id=' + code);
                if (res['status'] === 200 && res['payload'] !== null) {
                    let amount = res['payload']['harga'];
                    ongkir = amount;
                    $('#ongkir').val('Rp. ' + amount);
                    hitungTotal();
                } else {
                    ongkir = 0;
                    $('#ongkir').val(ongkir);
                    hitungTotal();
                }
            });
        });
    </script>
@endsection
