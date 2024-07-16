<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengunjung APT</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/css/vendor.bundle.base.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_pluginAdmin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets_pluginLanding/style.css') }}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets_pluginAdmin/images/logodjkn.png') }}" />
    <style>
        .dark-background {
            --background-color: #37517e;
            --default-color: #ffffff;
            --heading-color: #ffffff;
            --surface-color: #4668a2;
            --contrast-color: #ffffff;
            background-image: url('/assets_pluginFront/assets/img/Background_Utama-01.png');
            background-size: cover;
            background-position: center;
        }

        .center-image {
            margin-left: auto;
            margin-right: auto;
            display: block;

        }

        h6,
        .h6,
        h5,
        .h5,
        h4,
        .h4,
        h3,
        .h3,
        h2,
        .h2,
        h1,
        .h1,
        p,
        .p {
            font-weight: 700;
            color: #ffffff;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-scroller ">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center dark-background justify-content-center ">
                        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <h1>BUKU<br> Pengunjung</h1>
                            <p>Area Layanan Terpadu</p>
                            <button class="btn bg-white text-dark font-12" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ session('user')->USERNAME }}</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>  
                        </div>
                    </div>
                    <div class="col-lg-6  d-flex flex-row align-items-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('assets_pluginAdmin/images/logodjkn.png') }}" alt="logo">
                            </div>
                            <h4>Selamat Datang!</h4>
                            <h6 class="fw-light">Silahkan login!</h6>
                            <form class="pt-3" action="{{ route('pengunjung.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="TELEPON">No Telepon</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            id="TELEPON" name="TELEPON" placeholder="TELEPON">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-success" type="button" id="search-btn"> cari
                                            </button>
                                        </div>
                                        {{-- <input type="text" class="form-control form-control-lg border-left-0"
                                            id="TELEPON" name="TELEPON" placeholder="TELEPON"> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NIK">NIK</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            id="NIK" name="NIK" placeholder="NIK">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NAMA LENGKAP">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            id="NAMA" name="NAMA" placeholder="NAMA LENGKAP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="E-MAIL">E-Mail</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control form-control-lg border-left-0"
                                            id="EMAIL" name="EMAIL" placeholder="EMAIL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="INSTANSI?UNIT">Instansi / Unit</label>
                                    <div class="input-group">
                                        <select class="js-example-basic-single" id="INSTANSI_UNIT" name="INSTANSI_UNIT" style="width: 100%;">
                                            <option value="OP">Orang Perseorangan</option>
                                            <option value="BH">Badan Hukum</option>
                                            <option value="BP">Badan Publik</option>
                                            <option value="OK">Organisasi Kemasyarakatan</option>                                            
                                        </select>
                                        {{-- <input type="text" class="form-control form-control-lg border-left-0"
                                            id="INSTANSI_UNIT" name="INSTANSI_UNIT" placeholder="INSTANSI / UNIT"> --}}
                                    </div>
                                </div>
                                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div> --}}
                                <div class="my-3 d-grid gap-2 ">
                                    {{-- <button class="btn btn-rounded btn-success">Cari</button> --}}
                                    <button type="submit"
                                        class="btn btn-block btn-success btn-lg fw-semibold auth-form-btn">Submit
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('#search-btn').on('click', function() {

                var telepon = $('#TELEPON').val();
                //alert(telepon);
                $.ajax({
                    url: '{{ route('search') }}',
                    type: 'GET',
                    data: {
                        telepon: telepon
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#NIK').val(response.data.NIP_NIK);
                            $('#NAMA').val(response.data.NAMA);
                            $('#EMAIL').val(response.data.EMAIL);
                            $('#INSTANSI_UNIT').val(response.data.INSTANSI_UNIT).trigger('change');
                        } else {
                            // alert('No data found');
                            Swal.fire({
                                title: 'Data Belum ada!',
                                text: '{{ session('info') }}',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            });
        });
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets_pluginAdmin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets_pluginAdmin/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets_pluginAdmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets_pluginAdmin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets_pluginAdmin/js/misc.js') }}"></script>
    <script src="{{ asset('assets_pluginAdmin/js/settings.js') }}"></script>
    <script src="{{ asset('assets_pluginAdmin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets_pluginAdmin/js/select2.js') }}"></script>
    <!-- End custom js for this page -->
</body>

</html>
