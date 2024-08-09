@extends('layout.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="card-title mb-0">Profil Pengguna Layanan</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-title">Jenis Kelamin</div>
                                <div class="d-flex flex-wrap">
                                    <div class="doughnut-wrapper w-50">
                                        <canvas id="jeniskelamin" width="100" height="100"></canvas>
                                    </div>
                                    <div id="doughnut-chart-legend"
                                        class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-title">Jenis Unit Kerja</div>
                                <div class="d-flex flex-wrap">
                                    <div class="doughnut-wrapper w-50">
                                        <canvas id="jenisunitkerja" width="100" height="100"></canvas>
                                    </div>
                                    <div id="doughnut-chart-legend2"
                                        class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-title">Jenis Tiket</div>
                                <div class="d-flex flex-wrap">
                                    <div class="doughnut-wrapper w-50">
                                        <canvas id="jenistiket" width="100" height="100"></canvas>
                                    </div>
                                    <div id="doughnut-chart-legend3"
                                        class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-title">Tingkat Prioritas</div>
                                <div class="d-flex flex-wrap">
                                    <div class="doughnut-wrapper w-50">
                                        <canvas id="jenisprioritas" width="100" height="100"></canvas>
                                    </div>
                                    <div id="doughnut-chart-legend4"
                                        class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Jumlah dan Waktu Layanan</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="card-title">Total Layanan</div>
                                    <div class="d-flex flex-wrap">
                                        <div class="doughnut-wrapper w-50">
                                            <canvas id="jeniskanal" width="100" height="100"></canvas>
                                        </div>
                                        <div id="doughnut-chart-legend5"
                                            class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-0">
                                <div class="card-body">
                                    @foreach ($jenisKanalCounts as $kanal)
                                        <div class="card-title">{{ $kanal->URAIAN_JENISKANAL }}</div>
                                        <div class="">
                                            <p>Jumlah Layanan: {{ $kanal->count }}
                                                ({{ round(($kanal->count / $jenisKanalCounts->sum('count')) * 100, 2) }}%)
                                                <br>Rata-rata
                                                waktu layanan: 3 menit 1 detik
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- chart row starts here -->
    <div class="row">
        <div class="col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Jenis Kategori Layanan</h4>
                    <div class="table-responsive">
                        <table id="layananTable" class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Layanan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenisLayananCounts as $index => $layanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $layanan->URAIAN_JENISLAYANAN }}</td>
                                        <td>{{ $layanan->count }}
                                            ({{ round(($layanan->count / $jenisLayananCounts->sum('count')) * 100, 2) }}%)
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="card-title mb-0">Survei Kepuasan Masyarakat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>Indikator Penilaian</th>
                                    <th>Nilai Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Kejelasan Persyaratan Administrasi Layanan</td>
                                    <td>{{ number_format($results->avg('avg_administrasi_layanan'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Kejelasan Prosedur Layanan</td>
                                    <td>{{ number_format($results->avg('avg_prosedur_layanan'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Kejelasan Biaya Pelayanan</td>
                                    <td>{{ number_format($results->avg('avg_biaya_layanan'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Kesopanan, Keramahan, dan Kedisiplinan Petugas Layanan (Satpam dan Resepsionis)</td>
                                    <td>{{ number_format($results->avg('avg_kompetensi_petugas'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Kesopanan, Keramahan, dan Kedisiplinan Petugas Konsultasi</td>
                                    <td>{{ number_format($results->avg('avg_kesopanan_petugas'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Kenyamanan Sarana dan Prasarana</td>
                                    <td>{{ number_format($results->avg('avg_kualitas_sarana'), 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Ketersediaan Kanal</td>
                                    <td>{{ number_format($results->avg('avg_ketersediaan_kanal'), 1) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-success">
                                    <td class="final-score">Nilai Akhir</td>
                                    <td class="final-score">{{ number_format($finalScore, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" >Total Responden: {{ $totalRespondents }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('section_js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("jeniskelamin")) {
                var ctx = document.getElementById('jeniskelamin').getContext("2d");

                var Blue = '#5e6eed';
                var red = '#ff5730';
                var green = '#00cff4';

                var trafficChartData = {
                    datasets: [{
                        data: [{{ $maleCount }}, {{ $femaleCount }}, {{ $otherCount }}],
                        backgroundColor: [Blue, green, red],
                        hoverBackgroundColor: [Blue, green, red],
                        borderColor: [Blue, green, red],
                        legendColor: [Blue, green, red]
                    }],
                    labels: ['Laki-laki', 'Perempuan', 'Lainnya']
                };

                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] + '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };

                var trafficChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                document.getElementById("doughnut-chart-legend").innerHTML = trafficChart.generateLegend();
            }
            if (document.getElementById("jenisunitkerja")) {
                var ctx = document.getElementById('jenisunitkerja').getContext("2d");

                // Fungsi untuk menghasilkan warna acak
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Fungsi untuk menghasilkan array warna sesuai jumlah label
                function getColorsArray(size) {
                    var colorArray = [];
                    for (var i = 0; i < size; i++) {
                        colorArray.push(getRandomColor());
                    }
                    return colorArray;
                }

                // Data yang diambil dari Laravel
                var unitKerjaLabels = @json($unitKerjaLabels);
                var unitKerjaData = @json($unitKerjaData);

                // Array warna untuk semua elemen (background, hover, border, legend)
                var colorsArray = getColorsArray(unitKerjaLabels.length);

                var trafficChartData = {
                    datasets: [{
                        data: unitKerjaData,
                        backgroundColor: colorsArray,
                        hoverBackgroundColor: colorsArray,
                        borderColor: colorsArray,
                        legendColor: colorsArray
                    }],
                    labels: unitKerjaLabels
                };

                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] +
                                '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };

                var trafficChartCanvas = document.getElementById('jenisunitkerja').getContext("2d");
                var trafficChart = new Chart(trafficChartCanvas, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                document.getElementById("doughnut-chart-legend2").innerHTML = trafficChart.generateLegend();
            }
            if ($("#jenistiket").length) {
                var ctx = document.getElementById('jenistiket').getContext("2d");

                // Fungsi untuk menghasilkan warna acak
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Fungsi untuk menghasilkan array warna sesuai jumlah label
                function getColorsArray(size) {
                    var colorArray = [];
                    for (var i = 0; i < size; i++) {
                        colorArray.push(getRandomColor());
                    }
                    return colorArray;
                }

                // Data yang diambil dari Laravel
                var jenisTiketLabels = @json($jenisTiketLabels);
                var jenisTiketData = @json($jenisTiketData);

                // Array warna untuk semua elemen (background, hover, border, legend)
                var colorsArray = getColorsArray(jenisTiketLabels.length);

                var trafficChartData = {
                    datasets: [{
                        data: jenisTiketData,
                        backgroundColor: colorsArray,
                        hoverBackgroundColor: colorsArray,
                        borderColor: colorsArray,
                        legendColor: colorsArray
                    }],
                    labels: jenisTiketLabels
                };

                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] +
                                '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };

                var trafficChartCanvas = $("#jenistiket").get(0).getContext("2d");
                var trafficChart = new Chart(trafficChartCanvas, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                $("#doughnut-chart-legend3").html(trafficChart.generateLegend());
            }

            if ($("#jenisprioritas").length) {
                var ctx = document.getElementById('jenisprioritas').getContext("2d");

                // Fungsi untuk menghasilkan warna acak
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Fungsi untuk menghasilkan array warna sesuai jumlah label
                function getColorsArray(size) {
                    var colorArray = [];
                    for (var i = 0; i < size; i++) {
                        colorArray.push(getRandomColor());
                    }
                    return colorArray;
                }

                // Data yang diambil dari Laravel
                var jenisPrioritasLabels = @json($jenisPrioritasLabels);
                var jenisPrioritasData = @json($jenisPrioritasData);

                // Array warna untuk semua elemen (background, hover, border, legend)
                var colorsArray = getColorsArray(jenisPrioritasLabels.length);

                var trafficChartData = {
                    datasets: [{
                        data: jenisPrioritasData,
                        backgroundColor: colorsArray,
                        hoverBackgroundColor: colorsArray,
                        borderColor: colorsArray,
                        legendColor: colorsArray
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: jenisPrioritasLabels
                };
                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] +
                                '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };
                var trafficChartCanvas = $("#jenisprioritas").get(0).getContext("2d");
                var trafficChart = new Chart(trafficChartCanvas, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                $("#doughnut-chart-legend4").html(trafficChart.generateLegend());
            }

            if ($("#jeniskanal").length) {
                var ctx = document.getElementById('jeniskanal').getContext("2d");

                // Fungsi untuk menghasilkan warna acak
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Fungsi untuk menghasilkan array warna sesuai jumlah label
                function getColorsArray(size) {
                    var colorArray = [];
                    for (var i = 0; i < size; i++) {
                        colorArray.push(getRandomColor());
                    }
                    return colorArray;
                }

                // Data yang diambil dari Laravel
                var jenisKanalLabels = @json($jenisKanalLabels);
                var jenisKanalData = @json($jenisKanalData);

                // Array warna untuk semua elemen (background, hover, border, legend)
                var colorsArray = getColorsArray(jenisKanalLabels.length);

                var trafficChartData = {
                    datasets: [{
                        data: jenisKanalData,
                        backgroundColor: colorsArray,
                        hoverBackgroundColor: colorsArray,
                        borderColor: colorsArray,
                        legendColor: colorsArray
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: jenisKanalLabels
                };
                var trafficChartOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: false,
                    legendCallback: function(chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                trafficChartData.datasets[0].legendColor[i] +
                                '"></span>');
                            if (trafficChartData.labels[i]) {
                                text.push(trafficChartData.labels[i]);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    }
                };
                var trafficChartCanvas = $("#jeniskanal").get(0).getContext("2d");
                var trafficChart = new Chart(trafficChartCanvas, {
                    type: 'doughnut',
                    data: trafficChartData,
                    options: trafficChartOptions
                });
                $("#doughnut-chart-legend5").html(trafficChart.generateLegend());
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#layananTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
