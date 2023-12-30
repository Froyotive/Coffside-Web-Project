<!-- resources/views/promos/form.blade.php -->

<div class="container mt-4">
    <h2>{{ $title }}</h2>

    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($method)
        @method($method)
        @endisset

        <div class="form-group">
            <label for="nama_promo">Nama Promo:</label>
            <input type="text" class="form-control" id="nama_promo" name="nama_promo"
                value="{{ old('nama_promo', $promo->nama_promo ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="gambar_promo">Gambar Promo:</label>
            <input type="file" class="form-control-file" id="gambar_promo" name="gambar_promo">
            @isset($promo)
            <img src="{{ asset($promo->gambar_promo) }}" alt="{{ $promo->nama_promo }}" style="max-width: 100px;">
            @endisset
        </div>

        <div class="form-group">
            <label for="deskripsi_promo">Deskripsi Promo:</label>
            <textarea class="form-control" id="deskripsi_promo" name="deskripsi_promo" rows="4"
                required>{{ old('deskripsi_promo', $promo->deskripsi_promo ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="nilai_potongan">Nilai Potongan:</label>
            <input type="number" step="0.01" class="form-control" id="nilai_potongan" name="nilai_potongan"
                value="{{ old('nilai_potongan', $promo->nilai_potongan ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('promos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>