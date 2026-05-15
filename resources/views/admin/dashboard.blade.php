<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Dineary</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Selamat datang, {{ auth('admin')->user()->name }}</p>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <hr>

    {{-- KELOLA CAFE --}}
    <h2>Kelola Cafe</h2>
    <a href="{{ route('admin.cafes.create') }}">+ Tambah Cafe</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @forelse($cafes as $cafe)
        <tr>
            <td>{{ $cafe->name }}</td>
            <td>{{ $cafe->address }}</td>
            <td>{{ $cafe->categories->pluck('name')->join(', ') }}</td>
            <td>
                <a href="{{ route('admin.cafes.edit', $cafe->id) }}">Edit</a>
                <form method="POST" action="{{ route('admin.cafes.destroy', $cafe->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus cafe ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
            <tr><td colspan="4" style="text-align:center">Belum ada cafe.</td></tr>
        @endforelse
    </table>

    <hr>

    {{-- KELOLA REVIEW --}}
    <h2>Moderasi Review</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>User</th>
            <th>Cafe</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        @forelse($reviews as $review)
        <tr>
            <td>{{ $review->user->name ?? 'Pengguna' }}</td>
            <td>{{ $review->cafe->name ?? '-' }}</td>
            <td>{{ $review->rating }}/5</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->created_at->format('d M Y') }}</td>
            <td>
                <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus review ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
            <tr><td colspan="6" style="text-align:center">Belum ada review.</td></tr>
        @endforelse
    </table>

    <hr>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>