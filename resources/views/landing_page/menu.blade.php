<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">


    <title>Coffside Web</title>
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
                        <a class="nav-link" aria-current="page" href="{{ route('customer.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('promo') }}">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search Bar -->
    <p class="text " style="background-color: #004A62" text-color=""> </p>

    <div class="container" id="coffee">
        <h2 class="promo-heading mt-4">Premium Taste</h2>
        <div class="row" style="margin-top: 30px;">
            <div class="row" style="margin-top: 30px;">
                @foreach($menus as $menu)
                @if($menu->kategori_menu === 'Premium Taste')
                <div class="col-md-3 py-0 py-md-0">
                    <div class="card border-0">
                        <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
                        <div class="card-body">
                            <h3 class="menu-coffee">{{ $menu->nama_menu }}</h3>
                            <h5 class="menu-coffee">{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}
                                <span></span>
                            </h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <h2 class="promo-heading mt-4">Coffee</h2>
            <div class="row" style="margin-top: 30px;">
                @foreach($menus as $menu)
                @if($menu->kategori_menu === 'Coffee')
                <div class="col-md-3 py-0 py-md-0">
                    <div class="card border-0">
                        <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
                        <div class="card-body">
                            <h3 class="menu-coffee">{{ $menu->nama_menu }}</h3>
                            <h5 class="menu-coffee">{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}
                                <span></span>
                            </h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <h2 class="promo-heading mt-4">Non-Coffee</h2>
            <div class="row" style="margin-top: 30px;">
                @foreach($menus as $menu)
                @if($menu->kategori_menu === 'Non-Coffee')
                <div class="col-md-3 py-0 py-md-0">
                    <div class="card border-0">
                        <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
                        <div class="card-body">
                            <h3 class="menu-coffee">{{ $menu->nama_menu }}</h3>
                            <h5 class="menu-coffee">{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}
                                <span></span>
                            </h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <h2 class="promo-heading mt-4">Food</h2>
            <div class="row" style="margin-top: 30px;">
                @foreach($menus as $menu)
                @if($menu->kategori_menu === 'Food')
                <div class="col-md-3 py-0 py-md-0">
                    <div class="card border-0">
                        <img src="{{ asset($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
                        <div class="card-body">
                            <h3 class="menu-coffee">{{ $menu->nama_menu }}</h3>
                            <h5 class="menu-coffee">{{ 'Rp ' . number_format($menu->harga_menu, 0, ',', '.') }}
                                <span></span>
                            </h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>




    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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


</html>