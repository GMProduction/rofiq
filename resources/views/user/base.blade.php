<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>user</title>
    <!-- Favicon -->
{{--    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">--}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{asset('assets/js/swal.min.js')}}"></script>

</head>

<body style="background-color: #eeeeee">
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header" style="margin-top: 20px; margin-left: 24px; height: 40px; text-align: start">
{{--            <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">--}}
            <a>PERSEWAAN</a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="dashboard" href="/user/">
                            <i class="ni ni-bullet-list-67"></i>
                            <span class="nav-link-text" style="margin-left: 10px">Dashboard</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" id="pesanan" href="/user/pesanan">
                            <i class="ni ni-send"></i>
                            <span class="nav-link-text" style="margin-left: 10px">Transaksi</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" id="profil" href="/user/profil">
                            <i class="ni ni-single-02"></i>
                            <span class="nav-link-text" style="margin-left: 10px">Profil</span>
                        </a>
                    </li>



                </ul>
                <!-- Divider -->
                <hr class="my-3">

                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" target="">
                            <i class="text-red " data-feather="log-out"></i>
                            <span class="nav-link-text text-red" style="margin-left: 10px">keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-translucent-dark border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->

                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">

                    <li class="nav-item dropdown">

                        <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                            <!-- Dropdown header -->

                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="{{asset('assets/img/theme/team-1.jpg')}}"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">Hi, {{auth()->user()->username}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets/img/theme/team-4.png')}}">
                  </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">Hi, {{auth()->user()->username}}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">

                            <a href="/logout" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                   target="_blank">Candra</a>
                </div>
            </div>

        </div>
    </footer>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

{{--ETC--}}
<script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Argon JS -->
<script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
<script src="{{asset('assets/js/componen.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
<script>
    feather.replace()
</script>
@yield('script')

</body>

</html>
