<!-- resources/views/menus/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <!-- Gunakan tautan CDN Bootstrap atau sesuaikan dengan proyek Anda -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Menu</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}"
                    required>
            </div>
            <div class="form-group">
                <label for="kategori_menu">Kategori Menu:</label>
                <input type="text" class="form-control" id="kategori_menu" name="kategori_menu"
                    value="{{ $menu->kategori_menu }}" required>
            </div>
            <div class="form-group">
                <label for="gambar_menu">Gambar Menu:</label>
                <input type="file" class="form-control-file" id="gambar_menu" name="gambar_menu" accept="image/*">
            </div>
            <div class="form-group">
                <label for="harga_menu">Harga Menu:</label>
                <input type="number" class="form-control" id="harga_menu" name="harga_menu"
                    value="{{ $menu->harga_menu }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Tambahkan script JS Bootstrap di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>