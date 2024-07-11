@extends('app2')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    {{-- <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <p class="masthead-subheading font-weight-light mb-0">Panduan Penggunaan Aplikasi</p>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <a href="#" class="btn btn-outline-light mt-4">
                <i class="fas fa-download mr-2"></i> Download Panduan
            </a>
        </div>
    </header> --}}
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('assets/img/cta-bg.jpg') }}" alt="">

        <div class="container">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-9 text-center text-xl-start">
                    <h3>Panduan</h3>
                    <p>Silahkan download panduan dengan klik tombol di bawah sini.</p>
                </div>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started"><i class="bi bi-download"></i> Download</a>                    
                  </div>
            </div>

        </div>

    </section>
@endsection
