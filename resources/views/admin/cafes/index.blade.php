<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Cafe</title>
</head>
<body>
    <h1>Kelola Cafe</h1>
    <a href="{{ route('admin.cafes.create') }}">+ Tambah Cafe</a>

    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach($cafes as $cafe)
        <tr>
            <td>{{ $cafe->name }}</td>
            <td>{{ $cafe->address }}</td>
            <td>{{ $cafe->categories->pluck('name')->join(', ') }}</td>
            <td>
                <a href="{{ route('admin.cafes.edit', $cafe->id) }}">Edit</a>
                <form method="POST" action="{{ route('admin.cafes.destroy', $cafe->id) }}" style="display:inline">
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