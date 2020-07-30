<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>admin</title>
    <!-- Favicon -->
{{--    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">--}}
<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #eeeeee">

<!-- Main content -->
<div class="main-content" id="panel">
    <nav class="navbar navbar-light navbar-expand-lg bg-white" style="height: 90px">
        <a class="navbar-brand" href="#">Xtreme Radiance</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link text-sm ml-3" href="/">Beranda</a>
                <a class="nav-item nav-link text-sm ml-3" href="/kontak">Kontak Kami</a>
                <a class="nav-item nav-link text-sm ml-3" style="font-weight: bold" href="/cart"><i data-feather="shopping-cart"></i></a>

                @auth()
                <a class="nav-item nav-link text-sm ml-7 btn btn-outline-danger" style="font-weight: bold" href="/">Dashboard</a>
                <a class="nav-item nav-link text-sm text-danger ml-3" href="/logout">logout</a>
                @endauth
                @guest()
                <a class="nav-item nav-link text-sm ml-7 btn btn-outline-danger" style="font-weight: bold" href="/login">Login</a>
                @endguest
            </div>
        </div>

    </nav>

    <div class="d-block bg-gradient-red" style="height: 3px">

    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <h6>About</h6>
                    <p class="text-justify">ᴍᴀᴜ ʙɪᴋɪɴ ᴄᴜꜱᴛᴏᴍ ᴊᴇʀꜱᴇʏ ᴀᴛᴀᴜ ᴊᴀᴋᴇᴛ ᴘʀɪɴᴛɪɴɢ ꜱᴀᴛᴜᴀɴ ᴛᴀɴᴘᴀ ᴍɪɴɪᴍᴀʟ ᴏʀᴅᴇʀ?? ᴅɪꜱɪɴɪ ᴛᴇᴍᴘᴀᴛɴʏᴀ!! ᴏʀᴅᴇʀ ʙᴀɴʏᴀᴋ ʟᴇʙɪʜ ᴍᴜʀᴀʜ ᴅᴀɴ ᴅᴀᴘᴀᴛᴋᴀɴ ʙᴏɴᴜꜱ"ɴʏᴀ</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">Home</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2020 Rofiq
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/RadianceMerchandise/posts/langsung-ke-xtreme-radiance-storeada-45-desain-tshirt-persissolopasoepatialamatb/519308381574513/"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="dribbble" href="https://www.instagram.com/xtremeradiance/p/BF-uEi2iFYL/?hl=hr"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/swal.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

{{--ETC--}}
<script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Argon JS -->
<script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script>
    feather.replace()
</script>
@yield('script')

</body>

</html>
