<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bantuan Atayya</title>

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-pink-custom {
            background: linear-gradient(135deg, #ff4da6, #ff80bf);
            color: white;
        }

        .text-pink {
            color: #ff4da6;
        }

        .btn-pink {
            background-color: #ff4da6;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #e60073;
            color: white;
        }

        .hero {
            padding: 120px 0;
        }

        .hero h1 {
            font-size: 52px;
            font-weight: 700;
        }

        .feature-card {
            border: none;
            border-radius: 15px;
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,.1);
        }

        .section-title {
            font-weight: bold;
            color: #ff4da6;
            margin-bottom: 40px;
        }

        .footer {
            background: #111;
            color: white;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a href="/" class="navbar-brand font-weight-bold">
            <span class="text-pink">BANTUAN</span> ATAYYA
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="#beranda" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item">
                    <a href="#layanan" class="nav-link">Layanan</a>
                </li>

                <li class="nav-item">
                    <a href="#artikel" class="nav-link">Artikel</a>
                </li>

                <li class="nav-item">
                    <a href="#kontak" class="nav-link">Kontak</a>
                </li>

                <li class="nav-item ml-2">
                    <a href="/loginuser" class="btn btn-pink">
                        <i class="fas fa-user"></i> Login User
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<!-- HERO -->
<section id="beranda" class="bg-pink-custom hero text-center">
    <div class="container">

        <h1>Sistem Bantuan Sosial Modern</h1>

        <p class="lead mt-3">
            Bantuan Atayya membantu masyarakat mendapatkan informasi bantuan,
            pengajuan online, dan tracking penyaluran secara realtime.
        </p>

        <a href="#" class="btn btn-light btn-lg mt-3">
            Ajukan Bantuan
        </a>

    </div>
</section>

<!-- LAYANAN -->
<section id="layanan" class="py-5">
    <div class="container">

        <h2 class="text-center section-title">Layanan Kami</h2>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card feature-card shadow text-center p-4">
                    <i class="fas fa-hand-holding-heart fa-3x text-pink mb-3"></i>
                    <h5>Bantuan Sosial</h5>
                    <p>Informasi bantuan terbaru untuk masyarakat.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card feature-card shadow text-center p-4">
                    <i class="fas fa-file-signature fa-3x text-pink mb-3"></i>
                    <h5>Pengajuan Online</h5>
                    <p>Proses cepat dan mudah tanpa ribet.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card feature-card shadow text-center p-4">
                    <i class="fas fa-chart-line fa-3x text-pink mb-3"></i>
                    <h5>Tracking Bantuan</h5>
                    <p>Pantau status bantuan secara realtime.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- STATISTIK -->
<section class="py-5 bg-light">
    <div class="container">

        <h2 class="text-center section-title">Statistik Bantuan</h2>

        <div class="row text-center">

            <div class="col-md-4">
                <h1 class="text-pink">5000+</h1>
                <p>Penerima Bantuan</p>
            </div>

            <div class="col-md-4">
                <h1 class="text-pink">120+</h1>
                <p>Program Aktif</p>
            </div>

            <div class="col-md-4">
                <h1 class="text-pink">99%</h1>
                <p>Kepuasan Pengguna</p>
            </div>

        </div>

    </div>
</section>

<!-- ARTIKEL -->
<section id="artikel" class="py-5">
    <div class="container">

        <h2 class="text-center section-title">Artikel Terbaru</h2>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/400/200?1" class="card-img-top">
                    <div class="card-body">
                        <h5>Program Bantuan 2026</h5>
                        <p>Informasi bantuan terbaru untuk masyarakat.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/400/200?2" class="card-img-top">
                    <div class="card-body">
                        <h5>Cara Pengajuan Online</h5>
                        <p>Panduan lengkap pengajuan bantuan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/400/200?3" class="card-img-top">
                    <div class="card-body">
                        <h5>Jadwal Penyaluran</h5>
                        <p>Update jadwal bantuan terbaru.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="bg-pink-custom py-5 text-center text-white">
    <div class="container">

        <h2>Butuh Bantuan Sekarang?</h2>
        <p>Daftarkan diri Anda untuk mendapatkan bantuan sosial.</p>

        <a href="#" class="btn btn-light btn-lg mt-2">
            Daftar Sekarang
        </a>

    </div>
</section>

<!-- FOOTER -->
<footer id="kontak" class="footer py-4 text-center">
    <div class="container">

        <h5>Bantuan Atayya</h5>
        <p>Email: bantuanatayya@gmail.com</p>
        <p>Telp: 0852-5288-1056</p>

        <small>© 2026 Bantuan Atayya - All Rights Reserved</small>

    </div>
</footer>

</body>
</html>