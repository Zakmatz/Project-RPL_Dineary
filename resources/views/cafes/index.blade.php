<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dineary - Daftar Cafe</title>
</head>
<body>

    {{-- Navbar --}}
    <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 20px; background:#f5f5f5; border-bottom:1px solid #ddd;">
        <strong>Dineary</strong>
        <div>
            @auth
                <span>Halo, {{ auth()->user()->name }}</span> &nbsp;
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a> &nbsp;
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>

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
            <p><em>{{ $cafe->deskripsi_singkat }}</em></p>
            <p>{{ $cafe->price_range }}</p>
            <p>Rating: {{ number_format($cafe->averageRating(), 1) }} / 5</p>
            <p>
                @foreach($cafe->categories as $cat)
                    <span>{{ $cat->name }}</span>
                @endforeach
            </p>
        </div>
    @endforeach

    {{-- Pagination --}}
<div style="margin:20px 0; text-align:center;">
    @if($cafes->onFirstPage())
        <span>← Sebelumnya</span>
    @else
        <a href="{{ $cafes->previousPageUrl() }}">← Sebelumnya</a>
    @endif

    &nbsp; Halaman {{ $cafes->currentPage() }} dari {{ $cafes->lastPage() }} &nbsp;

    @if($cafes->hasMorePages())
        <a href="{{ $cafes->nextPageUrl() }}">Selanjutnya →</a>
    @else
        <span>Selanjutnya →</span>
    @endif
</div>

</body>
</html>