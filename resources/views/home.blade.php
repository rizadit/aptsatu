@extends('app')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-section')
@endsection
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row">
        <!-- Sisi kiri -->
        <div class="text-left">
            <!-- Masthead Avatar Image -->
            <img class="masthead-avatar mb-5" src="{{ asset('assets_pluginLanding/assets/img/landing.jpeg') }}"
                alt="..." />
        </div>

        <!-- Sisi kanan -->
        <div class="text-right">
            <div>
                <!-- Masthead Heading -->
                <h1 class="masthead-heading text-uppercase mb-0">INTEGRATED SUPPORT SERVICE</h1>
                <!-- Icon Divider -->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading -->
                <p class="masthead-subheading font-weight-light mb-0">Area Layanan Terpadu</p>
            </div>
        </div>
    </div>
</header>
{{-- <div>Hello World</div> --}}
@endsection