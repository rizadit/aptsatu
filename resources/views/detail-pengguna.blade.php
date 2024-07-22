@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
{{-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css"> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <style>
        .modal-dialog {
            max-width: 80%;
        }

        .modal-content {
            height: 90vh;
            overflow-y: auto;
        }

        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #2c8b4b;
            color: white;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            flex: 1;
            margin-right: 10px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            flex: 2;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f7f7e8;
        }

        .form-group select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #2c8b4b;
            color: white;
        }

        .form-group option {
            background-color: white;
            color: black;
        }
    </style>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="page-header flex-wrap">
                    <div class="header-left">
                        <h4 class="card-title">DAFTAR PENGGUNA LAYANAN</h4>
                        <p class="card-description"> Area Layanan Terpadu
                        </p>
                    </div>
                    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                            <i class="mdi mdi-plus-circle"></i> Tambah Data </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor Antrian</th>
                                <th>Nama</th>
                                <th>Urgensi</th>
                                <th>Subjek</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanans as $layanan)
                                <tr>
                                    <td>{{ $layanan->DIBUAT_TANGGAL }}</td>
                                    <td>{{ $layanan->NO_ANTRIAN }}</td>
                                    <td>{{ $layanan->NAMA_PENGUNJUNG }}</td>
                                    <td>{{ $layanan->ID_JENISPRIORITAS }}</td>
                                    <td>{{ $layanan->SUBJEK }}</td>
                                    <td>
                                        <label class="badge badge-danger">{{ $layanan->STATUS }}</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success detail-layanan"
                                            data-id="{{ $layanan->ID_LAYANAN }}">Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Data akan dimasukkan di sini oleh JavaScript -->
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control EMAIL" name="email"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">No Telepon</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control TELEPON" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control NAMA" name="nama"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Subjek</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control SUBJEK" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Departemen</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    @foreach ($departemen as $k)
                                                        <option value="{{ $k->ID_JENISDEPARTEMEN }}">
                                                            {{ $k->URAIAN_JENISDEPARTEMEN }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Kategori Layanan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option>${response.KATEGORI_LAYANAN || ''}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Kanal</label>
                                            <div class="col-sm-9">
                                                <select class="form-control KANAL">
                                                    @foreach ($kanal as $k)
                                                        <option value="{{ $k->ID_JENISKANAL }}">
                                                            {{ $k->URAIAN_JENISKANAL }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Prioritas</label>
                                            <div class="col-sm-9">
                                                <select class="form-control KANAL">
                                                    @foreach ($prioritas as $k)
                                                        <option value="{{ $k->ID_JENISPRIORITAS }}">
                                                            {{ $k->URAIAN_JENISPRIORITAS }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Jenis Tiket</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    @foreach ($tiket as $k)
                                                        <option value="{{ $k->ID_JENISTIKET }}">
                                                            {{ $k->URAIAN_JENISTIKET }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Jenis Pengguna Layanan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    @foreach ($pengguna as $k)
                                                        <option value="{{ $k->ID_JENISPENGGUNA }}">
                                                            {{ $k->URAIAN_JENISPENGGUNA }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    @foreach ($kelamin as $k)
                                                        <option value="{{ $k->ID_JENISKELAMIN }}">
                                                            {{ $k->URAIAN_JENISKELAMIN }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Detail Unit Kerja</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Inisial Agent</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Waktu Layanan Mulai</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Waktu Layanan Selesai</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Transkrip Percakapan</label>
                                            <div class="col-sm-9">
                                                <textarea name="content" id="editor"></textarea>
                                                {{-- <div class="main-container">
                                                    <div class="editor-container editor-container_document-editor editor-container_include-style" id="editor-container">
                                                        <div class="editor-container__menu-bar" id="editor-menu-bar"></div>
                                                        <div class="editor-container__toolbar" id="editor-toolbar"></div>
                                                        <div class="editor-container__editor-wrapper">
                                                            <div class="editor-container__editor"><div id="editor"></div></div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Pertanyaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Jawaban</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Note</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('section_js')
{{-- <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
        }
    }
</script> --}}
{{-- <script type="module" src="{{ asset('assets_pluginAdmin/js/ckeditorbaru.js') }}"></script> --}}
<script>
 ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
@endsection