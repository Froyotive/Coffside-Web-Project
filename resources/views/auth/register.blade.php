<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Coffside</title>
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
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('promo') }}">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ url('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/login.png" alt="login" class="login-card-img" />
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h2 class="judul-login">Register your account</h2>
                            <form action="{{ route('register.save') }}" method="POST">
                                @csrf
                                <p>Nama</p>
                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" name="name" id="exampleInputName"
                                        class="form-control @error('name')is-invalid @enderror"
                                        placeholder="Masukkan Nama Anda ...." />
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p>Email</p>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="exampleInputEmail"
                                        class="form-control @error('email')is-invalid @enderror"
                                        placeholder="Masukkan Email Anda ...." />
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p>Password</p>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="exampleInputPassword"
                                        class="form-control @error('password')is-invalid @enderror"
                                        placeholder="Masukkan Password Anda ...." />
                                    @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p>Konfirmasi Password</p>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Repeat Password</label>
                                    <input type="password" name="password_confirmation" id="exampleRepeatPassword"
                                        class="form-control @error('password_confirmation')is-invalid @enderror"
                                        placeholder="Masukkan Ulang Password Anda ...." />
                                    @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit"
                                    value="Register" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>