@extends('layout.app')
@section('title', 'Input')
@section('content-header', 'Input')
@section('content-section')
@endsection
@section('content')
<style>
    .card-link {
    display: block;
    text-decoration: none; /* Hilangkan garis bawah pada link */
    color: inherit; /* Warna teks mengikuti yang di dalam */
    max-width: auto; /* Set lebar maksimum card */
    margin: auto; /* Membuat card berada di tengah */
}

.card-link:hover {
    text-decoration: none; /* Pastikan tetap tanpa garis bawah saat dihover */
    color: inherit; /* Pastikan warna teks tidak berubah saat dihover */
}
</style>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INPUT DATA LAYANAN INFORMASI</h4>
                <p class="card-description"> Layanan Informasi
                </p>
                <div class="row">
                    <div class="col-sm-4 stretch-card grid-margin">
                        <a href="{{ route('detail-pengguna') }}" class="card-link">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('assets_pluginAdmin/images/dashboard/img_1.jpg') }}" alt="" />
                                </div>
                                <div class="card-body px-3 text-dark">
                                    <h5 class="font-weight-semibold"> Area Layanan Terpadu </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 stretch-card grid-margin">
                        <a href="{{ route('whatsapp', ['ID_KANAL' => '15844']) }}" class="card-link">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('assets_pluginAdmin/images/dashboard/img_2.jpg') }}" alt="" />
                                </div>
                                <div class="card-body px-3 text-dark">
                                    <h5 class="font-weight-semibold"> Layanan Whatsapp </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 stretch-card grid-margin">
                        <a href="{{ route('telepon', ['ID_KANAL' => '15842']) }}" class="card-link">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('assets_pluginAdmin/images/dashboard/img_3.jpg') }}" alt="" />
                                </div>
                                <div class="card-body px-3 text-dark">
                                    <h5 class="font-weight-semibold">Layanan Telepon</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
