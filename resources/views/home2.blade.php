@extends('app2')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-section')
@endsection
@section('content')
<section id="hero" class="hero section dark-background">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <img src="{{ asset('assets_pluginFront/assets/img/Utama_Icon_Depan.png') }}" class="img-fluid animated" alt="">            
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <p>Selamat Datang di</p>            
            <h1>INTEGRATED<br> SUPPORT<br> SERVICE</h1>
            <p>Layanan Informasi</p>            
        </div>
      </div>
    </div>

  </section>
  <!-- /Hero Section -->

  <!-- Clients Section -->
  
{{-- <div>Hello World</div> --}}
@endsection