@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    <style>
        .card .card-img {
            /* background-image: url('/assets_pluginAdmin/images/bg_card.jpg'); */
            background-image: url('/assets_pluginFront/assets/img/Background_Utama-01.png');
            background-size: cover;
        }

        p.round1 {
            font-size: 30px;
        }

        p.round3 {
            display: inline-block;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 20px;
            padding: 5px;
        }

        h1 {
            font-family: "Poppins", sans-serif;
            font-size: 50px;
        }
    </style>
    <div class="col-xl-12 stretch-card grid-margin">
        <div class="card card-img">
            <div class="card-body d-flex align-items-center">
                <row>
                    <div class="text-white">
                        <p class="round3">Halo 
                            <b>{{ session('user')->USERNAME ?? session()->get('user-data')['nama'] }}</b>, Selamat Datang di</p>                        
                    </div>
                    <div class="text-white">
                        <h1>INTEGRATED<br> SUPPORT<br> SERVICE</h1>
                        <p class="round1"> Area Layanan Terpadu </p>
                        {{-- <p>{{ session()->get('user-data')['nama'] }}</p>
                           <p>{{ session()->get('user-data')['nip'] }}</p> 
                            <p>{{ session()->get('user-data')['eselon_2'] }}</p>
                            <p>{{ session()->get('user-data')['eselon_3'] }}</p>
                            <p>{{ session()->get('user-data')['eselon_4'] }}</p>
                            <p>{{ session()->get('user-data')['kode_organisasi'] }}</p>
                            <p>{{ session()->get('user-data')['kode_induk_organisasi'] }}</p>
                            <p>{{ session()->get('user-data')['jabatan'] }}</p>
                            <p>{{ session()->get('user-data')['idKantor'] }}</p> --}}
                        {{-- <button class="btn bg-white font-12">Ge Premium</button> --}}
                    </div>
                </row>
                
            </div>
        </div>
    </div>
@endsection
