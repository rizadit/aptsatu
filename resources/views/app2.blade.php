<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>APT - Online</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets_pluginAdmin/images/logo_djkn.png') }}" rel="icon">
    <link href="{{ asset('assets_pluginFront/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_pluginFront/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_pluginFront/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_pluginFront/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_pluginFront/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_pluginFront/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets_pluginFront/assets/css/main.css') }}" rel="stylesheet">

    <style>
        .modal-content {
            background: rgba(217, 217, 217, 0.1);
            /* Warna dengan transparansi 10% */
            border: 2px solid rgba(255, 255, 255, 0.8);
            /* Warna border biru muda dengan transparansi 80% */
            border-radius: 20px;
            /* Membuat border lebih melengkung */
            color: white;
            /* Warna teks putih */
        }

        .modal-header,
        .modal-body {
            text-align: center;
        }

        .btn-custom {
            border: 2px solid rgba(255, 255, 255, 0.8);
            /* Border biru muda dengan transparansi */
            border-radius: 20px;
            /* Membuat border lebih melengkung */
            background-color: transparent;
            color: white;
            width: 100%;
            padding: 10px 20px;
            margin: 10px 0;
        }

        .btn-custom:hover {
            background-color: #1e6937;
            /* Background berubah pada hover */
        }
    </style>

</head>

<body class="index-page dark-background">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><img src="{{ asset('assets_pluginAdmin/images/logoo.png') }}" alt="logo"></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('panduan') }}">PANDUAN</a></li>
                    <li><a href="#">BANTUAN</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#transparentModal">LOGIN</a>
            {{-- <a class="btn-getstarted" href="{{ route('login') }}">LOGIN</a> --}}
            {{-- <a class="btn-getstarted" href="{{ route('kemenkeu-id.login') }}">LOGIN</a> --}}

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        @yield('content')
        <!-- /Clients Section -->

        <!-- About Section -->


    </main>

    <div class="modal fade" id="transparentModal" tabindex="-1" aria-labelledby="transparentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transparentModalLabel">Selamat Datang di Aplikasi Pelayanan Terpadu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Dari mana Anda berasal?</p>
                    <a class="btn btn-custom" href="{{ route('kemenkeu-id.login') }}">Kementerian Keuangan</a>
                    <a class="btn btn-custom" href="{{ route('login') }}">Selain Kementerian Keuangan</a>
                    {{-- <button type="button" class="btn btn-custom">Kementerian Keuangan</button>
                    <button type="button" class="btn btn-custom">Selain Kementerian Keuangan</button> --}}
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets_pluginFront/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_pluginFront/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets_pluginFront/assets/js/main.js') }}"></script>

</body>

</html>
