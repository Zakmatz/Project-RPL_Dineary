<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $cafe->name }} - Dineary</title>
</head>
<body>
    <a href="{{ route('cafes.index') }}">← Kembali</a>

    <h1>{{ $cafe->name }}</h1>
    <p>{{ $cafe->address }}</p>
    <p>{{ $cafe->description }}</p>
    <p>Jam Buka: {{ $cafe->open_hours }}</p>
    <p>Kisaran Harga: {{ $cafe->price_range }}</p>
    <p>Telepon: {{ $cafe->phone }}</p>
    <p>Rating: {{ number_format($cafe->averageRating(), 1) }} / 5</p>

    {{-- Kategori --}}
    <div>
        @foreach($cafe->categories as $cat)
            <span>{{ $cat->name }}</span>
        @endforeach
    </div>

    {{-- Bookmark --}}
    @auth
        <form method="POST" action="{{ route('bookmarks.toggle', $cafe->id) }}">
            @csrf
            <button type="submit">❤ Favorit</button>
        </form>
    @endauth

    {{-- Menu --}}
    <h2>Menu</h2>
    @foreach($cafe->menus as $menu)
        <div>
            <strong>{{ $menu->name }}</strong> - {{ $menu->price }}
            <p>{{ $menu->description }}</p>
        </div>
    @endforeach

    {{-- Form Review --}}
    @auth
        <h2>Tulis Review</h2>
        @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif
        @if(session('error')) <p style="color:red">{{ session('error') }}</p> @endif

        <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cafe_id" value="{{ $cafe->id }}">
            <div>
                <label>Rating (1-5):</label>
                <input type="number" name="rating" min="1" max="5" required>
            </div>
            <div>
                <label>Ulasan:</label>
                <textarea name="comment" required></textarea>
            </div>
            <div>
                <label>Foto (opsional):</label>
                <input type="file" name="photo" accept="image/*">
            </div>
            <button type="submit">Kirim Review</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> untuk menulis review.</p>
    @endauth

    {{-- Daftar Review --}}
    <h2>Review ({{ $cafe->reviews->count() }})</h2>
    @foreach($cafe->reviews as $review)
        <div>
            <strong>{{ $review->user->name }}</strong>
            <span>⭐ {{ $review->rating }}/5</span>
            <p>{{ $review->comment }}</p>
            @foreach($review->photos as $photo)
                <img src="{{ asset('storage/'.$photo->photo_path) }}" width="200">
            @endforeach
            @auth
                @if(auth()->id() === $review->user_id)
                    <form method="POST" action="{{ route('reviews.destroy', $review->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                @endif
            @endauth
        </div>
    @endforeach
</body>
</html>