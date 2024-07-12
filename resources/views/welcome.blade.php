@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    <style>
        .card-img {
            background-image: url('/assets_pluginAdmin/images/bg_card.jpg');
            background-size: cover;
        }
    </style>
    <div class="col-xl-12 stretch-card grid-margin">
        <div class="card card-img">
            <div class="card-body d-flex align-items-center">
                <div class="text-white">
                    <h1 class="font-20 font-weight-semibold mb-0"> Ge premium </h1>
                    <h1 class="font-20 font-weight-semibold">account!</h1>
                    <p>to optimize your selling prodcut</p>
                    <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                    <button class="btn bg-white font-12">Ge Premium</button>
                </div>
            </div>
        </div>
    </div>
@endsection
