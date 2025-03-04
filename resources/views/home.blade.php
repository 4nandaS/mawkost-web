<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .dropdown {
            display: inline-block; /* Menjadikan dropdown berjejer ke samping */
            margin-right: 10px; /* Menambahkan jarak antar dropdown */
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <img src="images/logomawkost.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-mid">
                Maw.Kost
            </a>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5">
        <div class="main-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>Maw cari kost?</h2>
                    <h2>Di Maw.Kost aja!</h2>
                    <button type="button" class="btn btn-dark">Cari Sekarang</button>
                </div>
                <div class="col-md-6">
                    {{-- <section class="container">
                        <div class="slider-wrapper">
                            <div class="slider">
                                <img id="slide-1" src="https://binabangunbangsa.com/wp-content/uploads/2020/03/tips-Manajemen-Rumah-Kost-yang-Baik-dan-Benar-.jpg" alt="foto kost">
                                <img id="slide-2" src="https://www.griyasatria.co.id/wp-content/uploads/2021/05/rumah-kost.png" alt="foto kost 2">
                                <img id="slide-3" src="https://pennyu.co.id/wp-content/uploads/2023/04/Kost-mahasiswa-jpg.webp" alt="foto kost 3">
                            </div>
                            <div class="slider-nav">
                                <a href="#slide-1"></a>
                                <a href="#slide-2"></a>
                                <a href="#slide-3"></a>
                            </div>
                        </div>
                    </section>  --}}
                    <img src="images/orang.png" alt="gambar orang">
                </div>               
                    <div class="container rounded-container">
                        <form method="POST" action="" autocomplete="off">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <select class="form-select custom-select" id="kota" name="kota">
                                        <option value="">Kota</option>
                                        <option value="1">Malang</option>
                                        <option value="2">Surabaya</option>
                                        <option value="3">Jogja</option>
                                        <option value="4">Bali</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select custom-select" id="tipe" name="tipe">
                                        <option value="">tipe</option>
                                        <option value="1">Kost</option>
                                        <option value="2">Kontrakan</option>
                                        <option value="3">Apartemen</option>
                                        <option value="4">Vila</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select custom-select" id="tempatTerdekat" name="tempatTerdekat">
                                        <option value="">Tempat Terdekat</option>
                                        <option value="1">UB</option>
                                        <option value="2">UMM</option>
                                        <option value="3">UM</option>
                                        <option value="4">BINUS</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Kode Properti" name="keyword">
                                </div>
                            </div>
                            <div class="row g-2 mt-3">
                                <div class="col-md-3 offset-md-9">
                                    <input type="submit" value="Cari" class="btn btn-dark w-100">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    {{-- <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2021 Website Saya. All rights reserved.</p>
    </footer> --}}

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
