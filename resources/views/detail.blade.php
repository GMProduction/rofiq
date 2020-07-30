@extends('navbar')
@section('content')


    <section class="container mt-5 mb-5">
        <div class="row">
            <div class="col-7">
                <img src="{{asset('assets/img/ex/1.jpg')}}" style="width: 100%; height: 300px; object-fit: cover">
            </div>

            <div class="col-5">
                <p style="font-size: 30px; font-weight: bold" class="mb-3 text-danger">Nama</p>
                <p style="font-size: 14px; font-weight: bold" class="text-black-50" >Deskripsi Panjang Deskripsi Panjang Deskripsi Panjang Deskripsi Panjang Deskripsi Panjang Deskripsi Panjang Deskripsi Panjang </p>
                <p style="font-size: 20px; font-weight: bold" class="text-red mb-4">Rp. 100.000 /Hari</p>

                <div style="display: flex" class="mb-4">
                    <a href="#" class="btn btn-white mr-0 quantity__minus text-dark" ><span>-</span></a>
                    <input name="quantity" id="qty" type="number"  class="text-center quantity__input" value="1" style="height: 45px; width: 70px; border: 1px solid #e8e3e3">
                    <a class="btn btn-danger quantity__plus"><span class="text-white">+</span></a>
                </div>

                <button type="button" class="btn btn-outline-danger w-25"><i data-feather="shopping-cart"></i></button>
                <button type="button" class="btn  btn-primary w-50">Beli Sekarang</button>

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
            <div class="col-3">
                <div class="card" style="height: 350px">
                    <img class="card-img-top" src="{{asset('assets/img/ex/1.jpg')}}" alt="Card image cap"
                         style="height: 150px; object-fit: cover; width: 100%">
                    <div class="card-body">
                        <h5 class="card-title mb-0"></h5>
                        <h4 class="card-title text-primary mt-0 mb-1 text-danger">Rp. 50.000/ pcs</h4>
                        <p class="card-text text-sm text-black-50" style="height: 50px; overflow: hidden">Deskripsi
                            panjang Deskripsi panjang Deskripsi panjang Deskripsi panjang Deskripsi panjang</p>
                        <a href="/product/" class="btn btn-danger">Detail</a>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@section('script')

    <script>
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
