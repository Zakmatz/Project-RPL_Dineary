<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Edit Cafe</title>
</head>
<body>
    <h1>Edit Cafe</h1>
    <a href="{{ route('admin.cafes.index') }}">← Kembali</a>

    <form method="POST" action="{{ route('admin.cafes.update', $cafe->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div><label>Nama:</label><input type="text" name="name" value="{{ $cafe->name }}" required></div>
        <div><label>Alamat:</label><textarea name="address" required>{{ $cafe->address }}</textarea></div>
        <div><label>Deskripsi:</label><textarea name="description">{{ $cafe->description }}</textarea></div>
        <div><label>Deskripsi Singkat:</label><input type="text" name="deskripsi_singkat" value="{{ $cafe->deskripsi_singkat }}" placeholder="Deskripsi singkat untuk ditampilkan di beranda"></div>
        <div><label>Telepon:</label><input type="text" name="phone" value="{{ $cafe->phone }}"></div>
        <div><label>Sosial Media:</label><input type="text" name="sosmed" value="{{ $cafe->sosmed }}" placeholder="@akun_sosmed"></div>
        <div><label>Jam Buka:</label><input type="text" name="open_hours" value="{{ $cafe->open_hours }}"></div>
        <div><label>Kisaran Harga:</label><input type="text" name="price_range" value="{{ $cafe->price_range }}"></div>
        <div><label>Foto Baru:</label><input type="file" name="photo" accept="image/*"></div>
        <div>
            <label>Kategori:</label>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                        {{ $cafe->categories->contains($category->id) ? 'checked' : '' }}>
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>