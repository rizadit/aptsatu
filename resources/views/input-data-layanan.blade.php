@extends('layout.app')
@section('title', 'Input')
@section('content-header', 'Input')
@section('content-section')
@endsection
@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INPUT DATA LAYANAN INFORMASI</h4>
                <p class="card-description"> Layanan Informasi
                </p>
                <div class="row">
                    <div class="col-sm-4 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body p-0">
                                <img class="img-fluid w-100"
                                    src="{{ asset('assets_pluginAdmin/images/dashboard/img_1.jpg') }}" alt="" />
                            </div>
                            <div class="card-body px-3 text-dark">                                
                                <h5 class="font-weight-semibold"> Area Layanan Terpadu </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body p-0">
                                <img class="img-fluid w-100"
                                    src="{{ asset('assets_pluginAdmin/images/dashboard/img_2.jpg') }}" alt="" />
                            </div>
                            <div class="card-body px-3 text-dark">                                
                                <h5 class="font-weight-semibold"> Area Layanan Whatsapp </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body p-0">
                                <img class="img-fluid w-100"
                                    src="{{ asset('assets_pluginAdmin/images/dashboard/img_3.jpg') }}" alt="" />
                            </div>
                            <div class="card-body px-3 text-dark">                                
                                <h5 class="font-weight-semibold">Area Layanan Telepon</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
