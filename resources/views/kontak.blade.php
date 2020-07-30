@extends('navbar')
@section('content')

    <section class="container mt-5 mb-5">
        <div class="row">
            <div class="col-7">
                <img src="{{asset('assets/img/slider/slider1.jpg')}}" style="width: 100%; height: 300px; object-fit: cover">
            </div>

            <div class="col-5">
                <p style="font-size: 30px; font-weight: bold" class="mb-3">Xtreme Radiance</p>
                <p style="font-size: 14px; font-weight: bold" class="text-black-50 mb-2" >Jl. Menco Raya No.22, Nilagraha, Pabelan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57169</p>
                <p style="font-size: 14px; font-weight: bold" class="text-black-50 mb-2" >extremeradiance@gmail.com</p>
                <p style="font-size: 14px; font-weight: bold" class="text-black-50 mb-2" >0814 3123 5512</p>


            </div>
        </div>

        <div class="d-block bg-gradient-red" style="height: 3px; width: 300px; margin-top: 50px">

        </div>

        <div class="text-left mt-2 mb-3">
            <h2>Lokasi</h2>
        </div>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.694607265244!2d110.76459065396729!3d-7.5560362862729615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5acfb35ece0e63d5!2sXtreme%20Radiance%20Store!5e0!3m2!1sid!2sid!4v1596091247534!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

    </section>

@endsection

@section('script')


@endsection
