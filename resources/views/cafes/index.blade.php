<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dineary - Daftar Cafe</title>
</head>
<body>
    <h1>Dineary</h1>

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('cafes.index') }}">
        <input type="text" name="search" placeholder="Cari cafe..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    {{-- Filter Kategori --}}
    <div>
        @foreach($categories as $category)
            <a href="{{ route('cafes.index', ['category' => $category->name]) }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    {{-- Daftar Cafe --}}
    @foreach($cafes as $cafe)
        <div>
            <h3><a href="{{ route('cafes.show', $cafe->id) }}">{{ $cafe->name }}</a></h3>
            <p>{{ $cafe->address }}</p>
            <p>{{ $cafe->price_range }}</p>
            <p>Rating: {{ number_format($cafe->averageRating(), 1) }} / 5</p>
            <p>
                @foreach($cafe->categories as $cat)
                    <span>{{ $cat->name }}</span>
                @endforeach
            </p>
        </div>
    @endforeach
</body>
</html>