@extends('app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    <header class="masthead bg-primary text-white text-center">
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
    </header>
@endsection
