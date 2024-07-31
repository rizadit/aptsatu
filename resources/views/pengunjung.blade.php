<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    
    {{-- <link rel="stylesheet" href="{{ asset('assets_pluginLanding/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_pluginAdmin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginLanding/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginLanding/style2.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets_pluginAdmin/images/logodjkn.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bx-menu'></i>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pengunjung') }}">
                    <i class='bx bx-edit-alt'></i>
                    <span class="link_name">Data Pengguna</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('pengunjung') }}">Data Pengguna</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('survey-pengunjung') }}">
                    <i class='bx bx-list-check'></i>
                    <span class="link_name">Survey Kepuasan</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{ route('survey-pengunjung') }}">Survey Kepuasan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Logout</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <i class='bx bx-log-out'></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center dark-background justify-content-center ">
                        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <h1 style="color: white;">BUKU<br> Pengunjung</h1>
                            <p style="color: white;">Area Layanan Terpadu</p>
                            <button
                                class="btn bg-white text-dark font-12">{{ session('kantor')->URAIAN_KANTOR }}</button>
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
                            <h6 class="fw-light">Silahkan mengisi daftar pengunjung</h6>
                            <form class="pt-3" action="{{ route('pengunjung.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="TELEPON">No Telepon</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control form-control-lg border-left-0"
                                            id="ID_KANTOR" name="ID_KANTOR" value="{{ session('kantor')->ID_KANTOR }}">
                                        <input type="text" class="form-control form-control-lg border-left-0"
                                            id="TELEPON" name="TELEPON" placeholder="TELEPON">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-success" type="button" id="search-btn"> cari
                                            </button>
                                        </div>
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
                                        <select class="js-example-basic-single" id="INSTANSI_UNIT"
                                            name="INSTANSI_UNIT" style="width: 100%;">
                                            @foreach ($jenisPengguna as $jenis)
                                                <option value="{{ $jenis->ID_JENISPENGGUNA }}">
                                                    {{ $jenis->URAIAN_JENISPENGGUNA }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="my-3 d-grid gap-2 ">
                                    <button type="submit"
                                        class="btn btn-block btn-success btn-lg fw-semibold auth-form-btn">Submit
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Terima kasih',
                html: `Nomor Antrian Bapak/Ibu adalah<br><br><strong style="display: inline-block; padding: 10px 20px; background-color: #00d284; color: white; font-size: 24px;">{{ session('no_antrian') }}</strong><br><br>Mohon menunggu, Petugas Layanan kami akan segera melayani sesuai antrean`,
                confirmButtonText: 'TUTUP',
                confirmButtonColor: '#FFC107'
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
                            $('#INSTANSI_UNIT').val(response.data.INSTANSI_UNIT).trigger(
                                'change');
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
     <script src="{{ asset('assets_pluginAdmin/vendors/js/vendor.bundle.base.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/vendors/select2/select2.min.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/js/off-canvas.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/js/hoverable-collapse.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/js/misc.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/js/settings.js') }}"></script>
     <script src="{{ asset('assets_pluginAdmin/js/todolist.js') }}"></script>
    <script src="{{ asset('assets_pluginAdmin/js/select2.js') }}"></script>   
</body>

</html>
