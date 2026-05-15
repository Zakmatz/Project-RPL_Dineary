<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tambah Cafe</title>
</head>
<body>
    <h1>Tambah Cafe</h1>
    <a href="{{ route('admin.dashboard') }}">← Kembali</a>

    <form method="POST" action="{{ route('admin.cafes.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <p style="color:red">{{ $message }}</p> @enderror
        </div>
        <div>
            <label>Alamat:</label>
            <textarea name="address" required>{{ old('address') }}</textarea>
            @error('address') <p style="color:red">{{ $message }}</p> @enderror
        </div>
        <div>
            <label>Deskripsi:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Deskripsi Singkat:</label>
            <input type="text" name="deskripsi_singkat" value="{{ old('deskripsi_singkat') }}" placeholder="Deskripsi singkat untuk beranda">
        </div>
        <div>
            <label>Telepon:</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label>Sosial Media:</label>
            <input type="text" name="sosmed" value="{{ old('sosmed') }}" placeholder="@akun_sosmed">
        </div>
        <div>
            <label>Jam Buka:</label>
            <input type="text" name="open_hours" value="{{ old('open_hours') }}" placeholder="08.00 - 22.00">
        </div>
        <div>
            <label>Kisaran Harga:</label>
            <input type="text" name="price_range" value="{{ old('price_range') }}" placeholder="Murah/Sedang/Mahal">
            @error('price_range') <p style="color:red">{{ $message }}</p> @enderror
        </div>
        <div>
            <label>Foto:</label>
            <input type="file" name="photo" accept="image/*">
            @error('photo') <p style="color:red">{{ $message }}</p> @enderror
        </div>
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