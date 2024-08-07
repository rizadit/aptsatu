<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #E8EEF1;
        }
        .header {
            background-color: #3F51B5;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .queue-number {
            font-size: 4rem;
            margin-top: 20px;
        }
        .service-box {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 20px;
        }
        .customer-service-1 { background-color: #7E57C2; }
        .customer-service-2 { background-color: #66BB6A; }
        .customer-service-3 { background-color: #EF5350; }
        .customer-service-4 { background-color: #42A5F5; }
        .lobby-1 { background-color: #FFA726; }
        .lobby-2 { background-color: #78909C; }
        .video-container {
            text-align: center;
            margin-top: 20px;
        }
        .footer {
            background-color: #3F51B5;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>RS. MITRA KELUARGA</h1>
    <p>Jl. A.Yani, RT.002/RW.011, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17144, Indonesia</p>
    <p>Telp: 08123456789</p>
    <div class="row">
        <div class="col-md-12 text-right">
            <p>{{ now()->format('d M Y') }}</p>
            <p id="time">{{ now()->format('H:i:s') }}</p>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center">
            <h2>NOMOR ANTRIAN</h2>
            <div class="queue-number">A0</div>
        </div>
        <div class="col-md-6 video-container">
            <video width="100%" controls>
                <source src="your-video-url.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2 service-box customer-service-1">A0</div>
        <div class="col-md-2 service-box customer-service-2">A0</div>
        <div class="col-md-2 service-box customer-service-3">A0</div>
        <div class="col-md-2 service-box customer-service-4">A0</div>
        <div class="col-md-2 service-box lobby-1">B0</div>
        <div class="col-md-2 service-box lobby-2">B0</div>
    </div>
</div>

<div class="footer">
    <p>JAM BUKA LAYANAN KAMI ADALAH PUKUL 07:00 s.d 21:00. TERIMA KASIH ATAS KUNJUNGAN ANDA. KAMI SENANTIASA MELAYANI SEPENUH HATI</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function updateTime() {
        const now = new Date();
        document.getElementById('time').textContent = now.toLocaleTimeString();
    }
    setInterval(updateTime, 1000);
</script>
</body>
</html>
