@extends('navbar')
@section('content')


    <section class="container mt-5 mb-5">
        <div class="row">
            <div class="col-7">
                <img src="{{asset('/uploads/image')}} / {{ $product->url }}" style="width: 100%; height: 300px; object-fit: cover">
            </div>

            <div class="col-5">
                <p style="font-size: 30px; font-weight: bold" class="mb-3 text-danger">{{ $product->nama }}</p>
                <p style="font-size: 14px; font-weight: bold" class="text-black-50" >{{ $product->deskripsi }} </p>
                @if($product->diskon > 0)
                <del><a style="font-size: 14px; font-weight: bold" class="text-dark mb-9    mr-3 ">Rp. {{ number_format($product->harga, 0, ',', '.') }}  /{{ $product->satuan }}</a></del>
                @endif
                <a style="font-size: 20px; font-weight: bold" class="text-red">Rp. {{ number_format($product->harga - $product->diskon, 0, ',', '.') }} /{{ $product->satuan }}</a>

                <div style="display: flex" class="mb-4 mt-3">
                    <a href="#" class="btn btn-white mr-0 quantity__minus text-dark" ><span>-</span></a>
                    <input name="qty" id="qty" type="number"  class="text-center quantity__input" value="1" style="height: 45px; width: 70px; border: 1px solid #e8e3e3">
                    <a class="btn btn-danger quantity__plus"><span class="text-white">+</span></a>
                </div>

                <button type="button" class="btn btn-outline-primary mt-0" data-toggle="modal" data-target="#exampleModalCenter">Pre Order (Custom)</button>
                <button type="button" id="order" onclick="addToCartOrder()" class="btn btn-primary mt-0" >Pesan Sekarang</button>

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Pre Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="deskripsi" class="text-dark" style="font-size: 11px">Custom Deskripsi "isi nama dan nomor punggung. cth: rofiq(24)"</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button id="pre" type="button" onclick="addToCartPreOrder()" class="btn btn-primary">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="d-block bg-gradient-red" style="height: 3px; width: 300px; margin-top: 50px">

        </div>

        <div class="text-left mt-2">
            <h2>Produk Kami</h2>
        </div>
    </section>

    <section class="container">
        <div class="row">
            @foreach($products as $v)
            <div class="col-3">
                <div class="card" style="height: 350px">
                    <img class="card-img-top" src="{{asset('/uploads/image')}} / {{ $v->url }}" alt="Card image cap"
                         style="height: 150px; object-fit: cover; width: 100%">
                    <div class="card-body">
                        <h5 class="card-title mb-0">{{ $v->nama }}</h5>
                        <h4 class="card-title text-primary mt-0 mb-1 text-danger">Rp. {{ number_format($v->harga, 0, ',', '.') }}/ pcs</h4>
                        <h6 class="card-title mb-0">{{ $v->kategori->nama }}</h6>
                        <p class="card-text text-sm text-black-50" style="height: 50px; overflow: hidden">{{ $v->deskripsi }}</p>
                        <a href="/product/{{ $v->id }}" class="btn btn-danger">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

@section('script')

    <script>
        async function addToCartOrder() {
            let data = {
                '_token': "{{ csrf_token() }}",
                id: '{{ $product->id }}',
                harga: '{{ $product->harga - $product->diskon}}',
                qty: $('#qty').val(),
                detail: '',
                tipe: 'order',
            };
            try {
                let res = await $.post('/ajax/addToCart', data);
                alert('Pesanan Berhasil Masuk Ke Keranjang')
            }catch (e) {
                console.log(e)
            }
        }

        async function addToCartPreOrder() {
            let data = {
                '_token': "{{ csrf_token() }}",
                id: '{{ $product->id }}',
                harga: '{{ $product->harga - $product->diskon}}',
                qty: $('#qty').val(),
                detail: $('#deskripsi').val(),
                tipe: 'pre',
            };
            try {
                let res = await $.post('/ajax/addToCart', data);
                alert('Pesanan Berhasil Masuk Ke Keranjang');
                $('#exampleModalCenter').modal('hide');
            }catch (e) {
                console.log(e)
            }
        }
        $(document).ready(function() {
            const minus = $('.quantity__minus');
            const plus = $('.quantity__plus');
            const input = $('.quantity__input');
            minus.click(function(e) {
                e.preventDefault();
                var value = input.val();
                if (value > 1) {
                    value--;
                }
                input.val(value);
            });

            plus.click(function(e) {
                e.preventDefault();
                var value = input.val();
                value++;
                input.val(value);
            })
        });
    </script>
@endsection
