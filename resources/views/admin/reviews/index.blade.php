<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Moderasi Review</title>
</head>
<body>
    <h1>Moderasi Review</h1>
    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1">
        <tr>
            <th>User</th>
            <th>Cafe</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->cafe->name }}</td>
            <td>{{ $review->rating }}/5</td>
            <td>{{ $review->comment }}</td>
            <td>
                <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus review ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>