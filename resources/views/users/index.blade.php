<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffside Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('admin_assets2/css/style.css') }}" />
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Coffside Admin Dashboard</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Navigation Sidebar</li>
                    <li class="sidebar-item">
                        <a href="{{url('admin/dashboard')}}" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('menus')}}" class="sidebar-link active">
                            <i class="fa-solid fa-hamburger pe-2"></i>
                            Menu
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('stocks')}}" class="sidebar-link">
                            <i class="fa-solid fa-archive pe-2"></i>
                            Stock
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('promos')}}" class="sidebar-link">
                            <i class="fa-solid fa-poll pe-2"></i>
                            Promo
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('users')}}" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Users
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('orders')}}" class="sidebar-link">
                            <i class="fa-solid fa-comment-dollar pe-2"></i>
                            Pemesanan
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('images/profile.jpg') }}" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container mt-5 card card-body">
                    <div class="container mt-4">
                        <h2>Data Akun Customer</h2>
                        <div class="mb-5 text-end ">
                            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah Akun Customer</a>
                        </div>
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>No. Id</th>
                                    <th>Nama Customer</th>
                                    <th>Email Customer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                @if($user->role === 'customer')
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus ?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Coffside</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin_assets2/js/script.js')}}"></script>
</body>

</html>