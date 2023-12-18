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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner-1.png') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <!-- Add more slides as needed -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h2 class="promo-heading mt-4">Today Promo</h2>
    <main>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/vanila-latte.png') }}"
                                class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                aria-label="Vanila Latte">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Vanilla Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 10.000</p>
                                    </div>
                                    <p1 style="color: #4b4b4b;">Rp 13.000</p1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="promo-heading mt-4">Our Menu</h2>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row g-0 mb-4">
                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/Americano.png') }}" class="bd-placeholder-img card-img-top"
                                width="100%" height="100%" aria-label="Americano">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Americano</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 10.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/aren-latte.png') }}" class="bd-placeholder-img card-img-top"
                                width="100%" height="100%" aria-label="Aren Latte">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Aren Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 9.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/butterscotch.png') }}"
                                class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                aria-label="Butter Scotch">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Butter Scotch</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 15.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/caffelatte.png') }}" class="bd-placeholder-img card-img-top"
                                width="100%" height="100%" aria-label="Caffe Latte">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Caffe Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 13.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-4">
                    <div class="row g-0">
                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="{{ asset('images/menu/caramellatte.png') }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                    aria-label="Caramel Latte">
                                <div class="card-body">
                                    <p class="card-text" style="color: #265171;">Caramel Latte</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <p>Rp 13.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="{{ asset('images/menu/creamycoffee.png') }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                    aria-label="Creamy Coffee">
                                <div class="card-body">
                                    <p class="card-text" style="color: #265171;">Creamy Coffee</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <p>Rp 15.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="{{ asset('images/menu/icecreamsandwich.png') }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                    aria-label="Creamy Coffee">
                                <div class="card-body">
                                    <p class="card-text" style="color: #265171;">Ice Cream Sandiwch</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <p>Rp 15.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="{{ asset('images/menu/milkysquash.png') }}"
                                    class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                    aria-label="Creamy Coffee">
                                <div class="card-body">
                                    <p class="card-text" style="color: #265171;">Milky Squash</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <p>Rp 14.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-4">
                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/oceanblue.png') }}" class="bd-placeholder-img card-img-top"
                                width="100%" height="100%" aria-label="Creamy Coffee">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Ocean Blue</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 16.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/saltedcaramellatte.png') }}"
                                class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                aria-label="Creamy Coffee">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Salted Caramel Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 18.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/vanila-latte.png') }}"
                                class="bd-placeholder-img card-img-top" width="100%" height="100%"
                                aria-label="Creamy Coffee">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Vanilla Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 10.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="{{ asset('images/menu/veganlatte.png') }}" class="bd-placeholder-img card-img-top"
                                width="100%" height="100%" aria-label="Creamy Coffee">
                            <div class="card-body">
                                <p class="card-text" style="color: #265171;">Vegan Latte</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p>Rp 14.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>




    </main>
    <h2 class="promo-heading mt-4">What They Say About Us</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Testimonial Card 1 -->
            <div class="col">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <h5 class="card-title">Jeon Wonwoo</h5>
                        <div class="rating">
                            <!-- Bintang Rating -->
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="card-text">"Coffside emang tempat ternyaman buat nongkrong sama temen. Rasa kopinya
                            pas banget di lidah dan pelayanannya juara!"</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial Card 2 -->
            <div class="col">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <h5 class="card-title">Maudy Ayudya</h5>
                        <div class="rating">
                            <!-- Bintang Rating -->
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="card-text">"Dateng ke sini buat nyobain es krim karambol yang viral banget di sosmed
                            dan ternyata beneran enak banget loh. Highly Recommended pokoknya"</p>
                    </div>
                </div>
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