@extends('user.base')
@section('content')

    <div class="main-content" id="panel">

        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center"
             style="min-height: 100px; background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-dark opacity-8"></span>
            <!-- Header container -->

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">

                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0 mb-2">Data Barang</h3>
                                </div>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card ">

                                                <!-- Light table -->
                                                <div class="table-responsive">
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="sort" data-sort="name">#</th>
                                                            <th scope="col" class="sort" data-sort="completion">gambar
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="budget">Nama
                                                                Produk
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Qty
                                                            </th>

                                                            <th scope="col" class="sort" data-sort="completion">Satuan
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                        @foreach($transaksi->cart as $t)
                                                            <tr>
                                                                <td class="budget">{{$loop->index+1}}</td>
                                                                <td class="budget"><a href="{{asset('uploads/image')}}/{{$t->product->url}}" target="_blank"><img src="{{asset('uploads/image')}}/{{$t->product->url}}" height="50"></a></td>
                                                                <td class="budget">{{$t->product->nama}}</td>
                                                                <td class="budget">{{$t->qty}}</td>
                                                                <td class="budget">{{$t->product->satuan}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0 mb-2">Data Pembayaran</h3>
                                </div>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card ">

                                                <!-- Light table -->
                                                <div class="table-responsive">
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="sort" data-sort="name">#</th>
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Tanggal
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Vendor
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Bukti
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Alasan
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Status
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                        @forelse($transaksi->payment as $p)
                                                            <tr>

                                                                <td>{{ $loop->index + 1}}</td>
                                                                <td class="budget">
                                                                    {{$p->created_at}}
                                                                </td>

                                                                <td class="budget">
                                                                    {{$p->vendor->nama}}
                                                                </td>

                                                                <td class="budget">
                                                                    <a target="_blank" href="{{asset('uploads/bukti')}}/{{$p->url}}"><img
                                                                            src="{{asset('uploads/bukti')}}/{{$p->url}}"
                                                                            style="height: 75px; width: 75px; object-fit: cover"></a>
                                                                </td>
                                                                <td class="budget">
                                                                    {{$p->description}}
                                                                </td>
                                                                <td>{{$p->status =='0' ? 'Menunggu': ($p->status =='1' ? 'Terima':'Tolak')}}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td class="text-center" colspan="5">Belum ada data pembayaran</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                                @csrf
                                <input type="hidden" name="id" value="">
                                <h6 class="heading-small text-muted mb-1"></h6>
                                <div class="pl-lg-4">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="tanggalPinjam">Tanggal Pesan</label>
                                                <input type="text" id="tanggalPinjam" name="tanggalPinjam" readonly
                                                       class="form-control" value="{{$transaksi->created_at}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="status">Status</label>
                                                <input type="text" id="status" name="status" readonly
                                                       class="form-control" value="{{$transaksi->status == '0' ? 'Menunggu' : ($transaksi->status == '1' ? 'Proses' : ($transaksi->status == '2' ? 'Selesai' : 'Tolak'))}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="total">Sub Harga</label>
                                                <input type="text" id="sub" name="total" readonly
                                                       class="form-control" value="Rp. {{number_format($transaksi->nominal,0,',','.')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="total">Ongkir</label>
                                                <input type="text" id="ongkir" name="total" readonly
                                                       class="form-control" value="Rp. {{number_format($transaksi->ongkir,0,',','.')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="total">Total Harga</label>
                                                <input type="text" id="total" name="total" readonly
                                                       class="form-control" value="Rp. {{number_format($transaksi->nominal+$transaksi->ongkir,0,',','.')}}">
                                            </div>
                                        </div>


                                        <hr class="my-4"/>
                                        <!-- Description -->
                                        <div class="col-12 text-right">
                                            <a type="submit" href="https://wa.me/628975050520?text=Saya%20ingin%20dengan%20menanyakan%20pesanan" class="btn btn-lg btn-success">Contact Admin</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('script')


@endsection
