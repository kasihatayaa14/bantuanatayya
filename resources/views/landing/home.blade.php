<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bantuan Atayya</title>

    <!-- ADMIN LTE -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

</head>

<body class="hold-transition layout-top-nav">

<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">

            <a href="/" class="navbar-brand">
                <span class="brand-text font-weight-bold">
                    BANTUAN ATAYYA
                </span>
            </a>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="#" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Kategori</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Berita</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Kontak</a>
                </li>

            </ul>

        </div>
    </nav>

    <!-- CONTENT -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container">
                <h1 class="m-0 text-dark">
                    Selamat Datang di Website Bantuan Atayya
                </h1>
            </div>
        </div>

        <div class="content">
            <div class="container">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title m-0">
                                    Bantuan Sosial
                                </h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    Informasi bantuan sosial terbaru untuk masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h5 class="card-title m-0">
                                    Pengajuan Bantuan
                                </h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    Ajukan bantuan dengan mudah melalui sistem online.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h5 class="card-title m-0">
                                    Informasi Penyaluran
                                </h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    Pantau status penyaluran bantuan secara realtime.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Bantuan Atayya
        </div>

        <strong>
            Copyright &copy; 2026
        </strong>
    </footer>

</div>

<!-- SCRIPTS -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>