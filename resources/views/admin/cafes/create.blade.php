<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tambah Cafe</title>
</head>
<body>
    <h1>Tambah Cafe</h1>
    <a href="{{ route('admin.cafes.index') }}">← Kembali</a>

    <form method="POST" action="{{ route('admin.cafes.store') }}" enctype="multipart/form-data">
        @csrf
        <div><label>Nama:</label><input type="text" name="name" required></div>
        <div><label>Alamat:</label><textarea name="address" required></textarea></div>
        <div><label>Deskripsi:</label><textarea name="description"></textarea></div>
        <div><label>Deskripsi Singkat:</label><input type="text" name="deskripsi_singkat" placeholder="Deskripsi singkat untuk ditampilkan di beranda"></div>
        <div><label>Telepon:</label><input type="text" name="phone"></div>
        <div><label>Sosial Media:</label><input type="text" name="sosmed" placeholder="@akun_sosmed"></div>
        <div><label>Jam Buka:</label><input type="text" name="open_hours" placeholder="08.00 - 22.00"></div>
        <div><label>Kisaran Harga:</label><input type="text" name="price_range" placeholder="Rp 10.000 - Rp 50.000"></div>
        <div><label>Foto:</label><input type="file" name="photo" accept="image/*"></div>
        <div>
            <label>Kategori:</label>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>