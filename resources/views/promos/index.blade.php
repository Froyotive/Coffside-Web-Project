<!-- resources/views/promos/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Promo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Promo</h2>

        <div class="mb-3">
            <a href="{{ route('promos.create') }}" class="btn btn-primary">Tambah Promo</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Promo</th>
                    <th>Gambar Promo</th>
                    <th>Deskripsi Promo</th>
                    <th>Nilai Potongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promos as $promo)
                <tr>
                    <td>{{ $promo->id }}</td>
                    <td>{{ $promo->nama_promo }}</td>
                    <td>
                        <img src="{{ asset($promo->gambar_promo) }}" alt="{{ $promo->nama_promo }}"
                            style="max-width: 100px;">
                    </td>
                    <td>{{ $promo->deskripsi_promo }}</td>
                    <td>{{ $promo->nilai_potongan }}</td>
                    <td>
                        <a href="{{ route('promos.edit', $promo->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>