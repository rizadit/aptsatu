@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content') 
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DAFTAR PENGGUNA LAYANAN</h4>
                <p class="card-description"> Area Layanan Terpadu
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor Antrian</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanans as $layanan)
                                <tr>
                                    <td>{{ $layanan->DIBUAT_TANGGAL }}</td>
                                    <td>{{ $layanan->NO_ANTRIAN }}</td>
                                    <td>{{ $layanan->NAMA }}</td>
                                    <td>{{ $layanan->TELEPON }}</td>
                                    <td>
                                        <button class="btn btn-outline-success detail-layanan"
                                            data-id="{{ $layanan->ID_LAYANAN }}">Pilih</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
