<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Kategori</title>
</head>
<body>
    <h1>Kelola Kategori</h1>
    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama kategori baru" required>
        <button type="submit">Tambah</button>
    </form>

    <table border="1">
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>