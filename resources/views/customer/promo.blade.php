<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Promo Coffside</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecede8;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-1.png') }}" alt="Coffside Logo" width="80" height="40">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('promo_customer') }}">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('menu_customer') }}">Menu</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <section class="header-main border-bottom bg-white">
        <div class="container-fluid">
            <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="d-flex form-inputs">
                        <input class="form-control" type="text" placeholder="Search any product...">
                        <i class="bx bx-search"></i>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="d-flex d-none d-md-flex flex-row align-items-center">
                        <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container" id="coffee">
        <h2 class="promo-heading mt-4">Promo</h2>
        <div class="row" style="margin-top: 30px;">
            @foreach($promos as $promo)
            <div class="col-md-3 py-0 py-md-0">
                <div class="card border-0">
                    <img src="{{ asset($promo->gambar_promo) }}" alt="{{ $promo->nama_promo }}">
                    <div class="card-body">
                        <h3 class="menu-coffee">{{ $promo->nama_promo }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer style="background-color: #265171; color: #ffffff; padding: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>COFFSIDE</h4>
                    <p>Our Location</p>
                    <p>Kantin Vokasi UI, Kukusam Kecamatan Beji, Kota Depok, Jawa Barat 16245</p>
                    <a href="https://www.instagram.com/coffside.id/" target="_blank">
                        <img src="{{ asset('images/logo/instagram-logo.png') }}" alt="Instagram" width="30" height="30">
                    </a>
                    <a href="https://www.tiktok.com/@coffside.id" target="_blank">
                        <img src="{{ asset('images/logo/tiktok-logo.png') }}" alt="TikTok" width="30" height="30">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>