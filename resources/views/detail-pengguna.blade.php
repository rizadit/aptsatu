@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('assets_pluginLanding/css/formStyle.css') }}" rel="stylesheet" />
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
                        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"
                            id="tambah-detail-layanan">
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
                                    <td>{{ $layanan->NAMA }}</td>
                                    <td>{{ $layanan->URAIAN_JENISPRIORITAS }}</td>
                                    <td>{{ $layanan->SUBJEK }}</td>
                                    <td>
                                        @if ($layanan->STATUS==0)
                                        <label class="badge badge-secondary">Draft</label>    
                                        @elseif ($layanan->STATUS==1)
                                        <label class="badge badge-warning">Belum Kirim</label>    
                                        @else
                                        <label class="badge badge-success">Sudah Kirim</label>    
                                        @endif
                                        
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
    <!-- tambah Modal -->
    <div class="modal fade" id="tambahdetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form id="tambahLayananForm" class="form-sample">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input style="height:10px;" type="email" class="form-control EMAIL"
                                                    name="EMAIL" value="" />
                                                <input type="hidden" name="ID_LAYANAN" class="form-control ID_LAYANAN">
                                                <input type="hidden" name="ID_KANTOR" class="form-control ID_KANTOR"
                                                    value="{{ session('kantor')->ID_KANTOR ?? session()->get('user-data')['idKantor'] }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">No Telepon</label>
                                            <div class="col-sm-9">
                                                <input style="height:10px;" type="text" class="form-control TELEPON"
                                                    name="TELEPON" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">NIP/NIK</label>
                                            <div class="col-sm-9">
                                                <input style="height:10px;" type="text" class="form-control NIP_NIK"
                                                    name="NIP_NIK" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input style="height:10px;" type="text" class="form-control NAMA"
                                                    name="NAMA" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Subjek</label>
                                            <div class="col-sm-9">
                                                <input style="height:10px;" type="text" class="form-control SUBJEK"
                                                    name="SUBJEK" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Departemen</label>
                                            <div class="col-sm-9">
                                                <select name="ID_JENISDEPARTEMEN" class="form-control DEPARTEMEN"
                                                    style="height:35px;" id="departemen">
                                                    <option value="">Select Department</option>
                                                    @foreach ($departemen as $k)
                                                        <option value="{{ $k->ID_DEPARTEMEN }}">
                                                            {{ $k->URAIAN_DEPARTEMEN }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Kategori Layanan</label>
                                            <div class="col-sm-9">
                                                <select name="ID_JENISLAYANAN"
                                                    class="form-control custom-fields-select JENISLAYANAN"
                                                    style="height:35px;" id="jenislayanan">
                                                    <option value="">Select Jenis Layanan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Kanal</label>
                                            <div class="col-sm-9">
                                                <select name="ID_JENISKANAL" class="form-control KANAL"
                                                    style="height:35px;">
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
                                                <select name="ID_JENISPRIORITAS" class="form-control PRIORITAS"
                                                    style="height:35px;">
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
                                                <select name="ID_JENISTIKET" class="form-control TIKET"
                                                    style="height:35px;">
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
                                                <select name="ID_JENISPENGGUNA" class="form-control PENGGUNA"
                                                    style="height:35px;">
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
                                                <select name="ID_JENISKELAMIN" class="form-control KELAMIN"
                                                    style="height:35px;">
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
                                                <input name="DETAIL_UNITKERJA" style="height:10px;" type="text"
                                                    class="form-control UNITKERJA" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Inisial Agent</label>
                                            <div class="col-sm-9">
                                                <input name="INITIAL_AGENT" style="height:10px;" type="text"
                                                    class="form-control INITIALAGENT" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Waktu Layanan Mulai</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" class="form-check-input timeInput1"
                                                    value="" />
                                                <input name="WAKTU_LAYANAN_MULAI" style="height:10px;" type="text"
                                                    class="form-control inputin MULAI" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Waktu Layanan Selesai</label>
                                            <div class="col-sm-9">
                                                {{-- <input type="checkbox" class="timeInput"/> <input style="height:10px;" type="text" class="form-control inputout " value="" readonly/> --}}
                                                <input type="checkbox" class="form-check-input timeInput2"
                                                    value="" />
                                                <input name="WAKTU_LAYANAN_SELESAI" style="height:10px;" type="text"
                                                    class="form-control inputout SELESAI" value="" readonly />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Transkrip Percakapan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control summernote" id="content" name="TRANSKRIP">                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Pertanyaan</label>
                                            <div class="col-sm-9">
                                                <input name="PERTANYAAN" type="text" class="form-control PERTANYAAN"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Jawaban</label>
                                            <div class="col-sm-9">
                                                <input name="JAWABAN" type="text" class="form-control JAWABAN"
                                                    value="" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Note</label>
                                            <div class="col-sm-9">
                                                <input name="NOTE" type="text" class="form-control NOTE"
                                                    value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary act-tambah" onclick="save('save')">Simpan
                        Data</button>
                    <button type="submit" class="btn btn-primary act-update" onclick="save('update')">Simpan
                        Data</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Kirim Tiket</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('section_js')
    <script></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true, // set focus to editable area after initializing summernote
                callbacks: {
                    onInit: function() {
                        // Tetapkan teks otomatis di sini
                        $('.summernote').summernote('code',
                            'Yth. Bapak/Ibu <span class="NAMA-PENGGUNA" id="NAMA-PENGGUNA-ADD">[Nama pengguna]</span></p><p><br></p><p>Terima kasih telah mengunjungi Area Pelayanan Terpadu <span class="NAMA-KANTOR">[Nama Kantor]</span>.</p><p>Berikut kami sampaikan riwayat percakapan dari layanan yang telah diberikan.</p><p><br></p><p>Unit Kerja/Perorangan: <span class="UNIT-KERJA">[Sesuai detail unit kerja]</span></p><p><br></p><p>Rangkuman Pertanyaan/Permasalahan: <span class="ISIAN-PERTANYAAN">[Isian pertanyaan]</span></p><p><br></p><p>Rangkuman Jawaban: <span class="ISIAN-JAWABAN">[Isian jawaban]</span></p><p><br></p><p>Demikian informasi ini kami sampaikan semoga dapat membantu Bapak/Ibu.</p><p>Kemudian sebagai bahan evaluasi atas kualitas layanan kami, mohon perkenan Bapak/Ibu untuk dapat memberikan feedback atas penyampaian jawaban kami.</p><p><br></p><p>Terimakasih telah menghubungi layanan <span class="NAMA-KANTOR">[Nama Kantor]</span> dan selamat beraktivitas kembali,</p><p><br></p><p><br></p><p>ttd.</p><p><span class="NAMA-KANTOR">[Nama Kantor]</span></p>'
                        );
                    }
                }
            });
            var namakantor = "{{ session('kantor')->URAIAN_KANTOR ?? session()->get('user-data')['URAIAN_KANTOR'] }}";
            $('.NAMA-KANTOR').text(namakantor);
            // Event listener untuk input nama
            $('.NAMA').on('input', function() {
                var NAMAPENGGUNA = $(this).val();
                var currentContent = $('.summernote').summernote('code');
                var tempDiv = $('<div>').html(currentContent);
                tempDiv.find('.NAMA-PENGGUNA').text(NAMAPENGGUNA);
                $('.summernote').summernote('code', tempDiv.html());
            });
            $('.UNITKERJA').on('input', function() {
                var UNITKERJA = $(this).val();
                var currentContent = $('.summernote').summernote('code');
                var tempDiv = $('<div>').html(currentContent);
                tempDiv.find('.UNIT-KERJA').text(UNITKERJA);
                $('.summernote').summernote('code', tempDiv.html());
                // $('.UNIT-KERJA').text($(this).val());
            });
            $('.PERTANYAAN').on('input', function() {
                var PERTANYAAN = $(this).val();
                var currentContent = $('.summernote').summernote('code');
                var tempDiv = $('<div>').html(currentContent);
                tempDiv.find('.ISIAN-PERTANYAAN').text(PERTANYAAN);
                $('.summernote').summernote('code', tempDiv.html());
                // $('.ISIAN-PERTANYAAN').text($(this).val());
            });
            $('.JAWABAN').on('input', function() {
                var JAWABAN = $(this).val();
                var currentContent = $('.summernote').summernote('code');
                var tempDiv = $('<div>').html(currentContent);
                tempDiv.find('.ISIAN-JAWABAN').text(JAWABAN);
                $('.summernote').summernote('code', tempDiv.html());
                // $('.ISIAN-JAWABAN').text($(this).val());
            });

            var now = new Date();
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var seconds = String(now.getSeconds()).padStart(2, '0');
            var currentTime = hours + ':' + minutes + ':' + seconds;
            $('.inputin').val(currentTime);
            $('.timeInput1').change(function() {
                if (this.checked) {
                    $('.inputin').val(currentTime);
                } else {
                    $('.inputin').val('');
                }
            });

            $('.timeInput2').change(function() {
                if (this.checked) {
                    $('.inputout').val(currentTime);
                } else {
                    $('.inputout').val('');
                }
            });

            $('.DEPARTEMEN').on('change', function() {
                var departemenID = $(this).val();
                // alert('ets');
                if (departemenID) {
                    $.ajax({
                        url: '/get-jenis-layanan/' + departemenID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('.JENISLAYANAN').empty();
                            $('.JENISLAYANAN').append(
                                '<option value="">Select Jenis Layanan</option>');
                            $.each(data, function(key, value) {
                                $('.JENISLAYANAN').append('<option value="' + value
                                    .ID_JENISLAYANAN + '">' + value
                                    .URAIAN_JENISLAYANAN + '</option>');
                            });
                        }
                    });
                } else {
                    $('.JENISLAYANAN').empty();
                    $('.JENISLAYANAN').append('<option value="">Select Jenis Layanan</option>');
                }
            });
            //tambahlayana
            $('#tambah-detail-layanan').on('click', function() {
                // var id = $(this).data('id');
                $('#tambahLayananForm')[0].reset();
                $('.act-tambah').removeClass('d-none');
                $('.act-update').addClass('d-none');
                $('#tambahdetailModal').modal('show');

            });
            $('#tambahLayananForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('layanan.tambah') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // alert(response.success);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.success,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Menutup modal dan menyegarkan halaman
                                $('#tambahdetailModal').modal(
                                    'hide'); // Ganti #myModal dengan ID modal Anda
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr) {
                        // alert('Gagal memperbarui data layanan.');
                        let errorMessage = 'Gagal memperbarui data layanan.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }

                        Swal.fire({
                            title: 'Gagal!',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
            //updatelayanan
            $('.detail-layanan').on('click', function() {
                $('.act-tambah').addClass('d-none');
                $('.act-update').removeClass('d-none');
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ route('detail') }}',
                    type: 'GET',
                    data: {
                        ID_LAYANAN: id
                    },
                    success: function(response) {
                        if (response.success) {
                            // Isi field form dengan data dari respons
                            $('.ID_LAYANAN').val(response.data.ID_LAYANAN || '');
                            $('.EMAIL').val(response.data.EMAIL || '');
                            $('.TELEPON').val(response.data.TELEPON || '');
                            $('.NAMA').val(response.data.NAMA || '');
                            $('.SUBJEK').val(response.data.SUBJEK || '');

                            // Mengatur nilai dropdown jika data ada, jika tidak, atur ke kosong
                            if (response.data.ID_JENISDEPARTEMEN) {
                                $('.DEPARTEMEN').val(response.data.ID_JENISDEPARTEMEN).trigger(
                                    'change');
                            } else {
                                $('.DEPARTEMEN').val('').trigger('change');
                            }

                            if (response.data.ID_JENISLAYANAN) {
                                $.ajax({
                                    url: '/get-jenis-layanan/' + response.data
                                        .ID_JENISDEPARTEMEN,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        $('.JENISLAYANAN').empty();
                                        $('.JENISLAYANAN').append(
                                            '<option value="">Select Jenis Layanan</option>'
                                        );
                                        $.each(data, function(key, value) {
                                            if (response.data
                                                .ID_JENISLAYANAN === value
                                                .ID_JENISLAYANAN) {
                                                $('.JENISLAYANAN').append(
                                                    '<option selected value="' +
                                                    value
                                                    .ID_JENISLAYANAN +
                                                    '">' + value
                                                    .URAIAN_JENISLAYANAN +
                                                    '</option>');
                                            } else {
                                                $('.JENISLAYANAN').append(
                                                    '<option value="' +
                                                    value
                                                    .ID_JENISLAYANAN +
                                                    '">' + value
                                                    .URAIAN_JENISLAYANAN +
                                                    '</option>');
                                            }

                                        });
                                    }
                                });
                                // alert(response.data.ID_JENISLAYANAN);

                            } else {
                                $('.JENISLAYANAN').val('').trigger('change');
                            }

                            if (response.data.ID_JENISKANAL) {
                                $('.KANAL').val(response.data.ID_JENISKANAL).trigger(
                                    'change');
                            } else {
                                $('.KANAL').val('').trigger('change');
                            }

                            if (response.data.ID_JENISPRIORITAS) {
                                $('.PRIORITAS').val(response.data.ID_JENISPRIORITAS).trigger(
                                    'change');
                            } else {
                                $('.PRIORITAS').val('').trigger('change');
                            }

                            if (response.data.ID_JENISTIKET) {
                                $('.TIKET').val(response.data.ID_JENISTIKET).trigger('change');
                            } else {
                                $('.TIKET').val('').trigger('change');
                            }

                            if (response.data.ID_JENISPENGGUNA) {
                                $('.PENGGUNA').val(response.data.ID_JENISPENGGUNA).trigger(
                                    'change');
                            } else {
                                $('.PENGGUNA').val('').trigger('change');
                            }

                            if (response.data.ID_JENISKELAMIN) {
                                $('.KELAMIN').val(response.data.ID_JENISKELAMIN).trigger(
                                    'change');
                            } else {
                                $('.KELAMIN').val('').trigger('change');
                            }
                            var TRANSKRIP = response.data.TRANSKRIP;
                            console.log("Isi TRANSKRIP:", TRANSKRIP);

                            // Mengisi semua Summernote dengan konten dari response
                            $('.summernote').each(function() {
                                if (TRANSKRIP) {
                                    $(this).summernote('code', TRANSKRIP);
                                } else {
                                    $(this).summernote('code',
                                        'Yth. Bapak/Ibu <span class="NAMA-PENGGUNA" id="NAMA-PENGGUNA-ADD">' +
                                        response.data.NAMA +
                                        '</span></p><p><br></p><p>Terima kasih telah mengunjungi Area Pelayanan Terpadu <span class="NAMA-KANTOR">' +
                                        namakantor +
                                        '</span>.</p><p>Berikut kami sampaikan riwayat percakapan dari layanan yang telah diberikan.</p><p><br></p><p>Unit Kerja/Perorangan: <span class="UNIT-KERJA">' +
                                        response.data.DETAIL_UNITKERJA +
                                        '</span></p><p><br></p><p>Rangkuman Pertanyaan/Permasalahan: <span class="ISIAN-PERTANYAAN">' +
                                        response.data.PERTANYAAN +
                                        '</span></p><p><br></p><p>Rangkuman Jawaban: <span class="ISIAN-JAWABAN">' +
                                        response.data.JAWABAN +
                                        '</span></p><p><br></p><p>Demikian informasi ini kami sampaikan semoga dapat membantu Bapak/Ibu.</p><p>Kemudian sebagai bahan evaluasi atas kualitas layanan kami, mohon perkenan Bapak/Ibu untuk dapat memberikan feedback atas penyampaian jawaban kami.</p><p><br></p><p>Terimakasih telah menghubungi layanan <span class="NAMA-KANTOR">' +
                                        namakantor +
                                        '</span> dan selamat beraktivitas kembali,</p><p><br></p><p><br></p><p>ttd.</p><p><span class="NAMA-KANTOR">' +
                                        namakantor + '</span></p> ');

                                }
                            });
                            $('.UNITKERJA').val(response.data.DETAIL_UNITKERJA || '');
                            $('.INITIALAGENT').val(response.data.INITIAL_AGENT || '');
                            $('.MULAI').val(response.data.WAKTU_LAYANAN_MULAI || '');
                            $('.SELESAI').val(response.data.WAKTU_LAYANAN_SELESAI || '');
                            $('.PERTANYAAN').val(response.data.PERTANYAAN || '');
                            $('.JAWABAN').val(response.data.JAWABAN || '');
                            $('.NOTE').val(response.data.NOTE || '');

                            // Tampilkan modal
                            $('#tambahdetailModal').modal('show');
                        } else {
                            // Tampilkan alert jika tidak ada data
                            Swal.fire({
                                title: 'Data Belum ada!',
                                text: response.message,
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {
                        // Tangani error AJAX
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi masalah saat mengambil data.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });            
        });

        function save(url) {
            var formData = $('#tambahLayananForm').serialize();
            let requestUrl = (url === 'save') ? "{{ route('layanan.tambah') }}" : "{{ route('layanan.update') }}";

            $.ajax({
                url: requestUrl,
                type: "POST",
                data: formData,
                success: function(response) {
                    // alert(response.success);
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.success,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Menutup modal dan menyegarkan halaman
                            $('#tambahdetailModal').modal(
                                'hide'); // Ganti #myModal dengan ID modal Anda
                            location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    // alert('Gagal memperbarui data layanan.');
                    let errorMessage = 'Gagal memperbarui data layanan.';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    }

                    Swal.fire({
                        title: 'Gagal!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>

@endsection
