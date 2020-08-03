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
                                                            <th scope="col" class="sort" data-sort="completion">Harga
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Total
                                                            </th>
                                                            <th scope="col" class="sort" data-sort="completion">Detail
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                        @foreach($trans->cart as $v)
                                                            <tr>

                                                                <td class="budget">
                                                                    {{ $loop->index + 1 }}
                                                                </td>

                                                                <td class="budget">
                                                                    <img
                                                                        src="{{asset('/images/uploads')}} / {{ $v->product->url }}"
                                                                        style="height: 100px; width: 100px; object-fit: cover">
                                                                </td>

                                                                <td class="budget">
                                                                    {{ $v->product->nama}}
                                                                </td>


                                                                <td class="budget">
                                                                    {{ $v->qty }}
                                                                </td>

                                                                <td class="budget">
                                                                    {{ $v->product->satuan }}
                                                                </td>

                                                                <td class="budget">
                                                                    Rp {{ number_format($v->harga, 0, ',', '.')}}
                                                                </td>

                                                                <td class="budget">
                                                                    Rp {{ number_format($v->harga * $v->qty, 0, ',', '.')}}
                                                                </td>
                                                                <td class="budget">
                                                                    {{ $v->detail }}
                                                                </td>
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

                        <div class="card-body">
                            <form action="/user/profil/update" method="POST">
                                <input type="hidden" name="id" value="">
                                <h6 class="heading-small text-muted mb-1"></h6>
                                <div class="pl-lg-4">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="tanggalPinjam">Tanggal
                                                    Pesan</label>
                                                <input type="text" id="tanggalPinjam" name="tanggalPinjam" readonly
                                                       class="form-control" value="{{ $trans->created_at }}">
                                            </div>
                                        </div>
                                        @php
                                            $status = "Menunggu Konfirmasi"
                                        @endphp
                                        @switch($trans->status)
                                            @case('0')
                                            {{ $status = "Menunggu Konfirmasi" }}
                                            @break
                                            @case('1')
                                            {{ $status = "Di Terima" }}
                                            @break
                                            @case('2')
                                            {{ $status = "Di Tolak" }}
                                            @break
                                            @default
                                            @break
                                        @endswitch
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="status">Status</label>
                                                <input type="text" id="status" name="status" readonly
                                                       class="form-control" value="{{ $status }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="total">Total Harga</label>
                                                <input type="text" id="total" name="total" readonly
                                                       class="form-control"
                                                       value="Rp. {{ number_format($trans->nominal + $trans->ongkir, 0, ',', '.') }}">
                                            </div>
                                        </div>


                                        <hr class="my-4"/>
                                        <!-- Description -->
                                        <div class="col-12 text-right">
                                            <a type="submit"
                                               href="https://wa.me/628975050520?text=Saya%20ingin%20dengan%20menanyakan%20pesanan"
                                               class="btn btn-lg btn-success">Contact Admin</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')


@endsection
