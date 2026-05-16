<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dineary - Dashboard User</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dineary-cream antialiased overflow-x-hidden">

    <header class="w-full flex flex-col relative">

        <nav class="w-full bg-dineary-cream relative z-50 shadow-sm">
            <div class="flex justify-between items-center px-10 py-4 max-w-[1440px] mx-auto w-full">
                <a href="{{ route('user.dashboard') }}">
                    <img src="{{ asset('images/Logo D Coklat.png') }}" alt="Logo" class="w-[50px] h-[48px] object-contain">
                </a>

                <div class="flex items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-red-500 font-sans font-bold text-sm hover:underline mr-2 cursor-pointer">
                            Keluar
                        </button>
                    </form>
                    <a href="{{ route('profile.dashboard') }}" class="w-12 h-12 bg-dineary-brown rounded-full flex items-center justify-center shadow-md hover:scale-105 transition-transform cursor-pointer">
                        <svg class="w-7 h-7 text-white mt-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>

        <div class="absolute top-[80px] left-0 w-full h-[300px] z-0">
            <img src="{{ asset('images/Gambar Roti.jpg') }}" class="w-full h-full object-cover opacity-40 mix-blend-multiply" alt="Background Roti">
            <div class="absolute inset-0 bg-gradient-to-b from-dineary-cream/50 to-transparent"></div>
        </div>

        <div class="relative z-10 w-full max-w-[1100px] mx-auto px-6 pt-[140px] pb-16">
            <div class="bg-white rounded-[40px] shadow-xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 md:gap-12 border border-gray-100">

                <div class="flex flex-col items-center gap-4">
                    <div class="w-40 h-40 bg-dineary-brown rounded-full flex items-center justify-center border-[6px] border-white shadow-md -mt-24">
                        <svg class="w-24 h-24 text-gray-200 mt-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <a href="{{ route('profile.dashboard') }}" class="border-2 border-dineary-brown text-dineary-brown font-sans font-bold text-sm px-8 py-2 rounded-full hover:bg-dineary-brown hover:text-white transition-colors">
                        Lihat Profile
                    </a>
                </div>

                <div class="flex-1 text-center md:text-left mt-4 md:mt-0">
                    <h1 class="font-heading font-black text-[50px] md:text-[60px] text-dineary-green leading-none mb-2">Selamat Datang!</h1>
                    <p class="font-sans font-black text-dineary-brown text-xl">{{ '@' . strtolower(explode(' ', auth()->user()->name)[0]) }}</p>
                </div>

                <div class="border-2 border-dineary-green rounded-3xl p-6 flex flex-col items-center justify-center min-w-[180px] shadow-sm">
                    <span class="font-sans font-bold text-dineary-green text-[15px] mb-1">Total review</span>
                    <span class="font-heading font-black text-[65px] text-dineary-brown leading-none">
                        {{ auth()->user()->reviews ? auth()->user()->reviews->count() : 0 }}
                    </span>
                </div>

            </div>
        </div>

    </header>

    <main class="w-full bg-dineary-green py-20 flex flex-col items-center">

        <h2 class="font-heading text-[55px] md:text-[65px] font-black text-dineary-yellow uppercase tracking-wider mb-2 drop-shadow-md text-center" style="-webkit-text-stroke: 1px #EFC878;">
            PILIHAN TOKO
        </h2>
        <p class="font-sans text-dineary-cream text-[15px] font-bold mb-10 tracking-wide text-center">
            Cari cafe pilihan mu!
        </p>

        <form method="GET" action="{{ route('user.dashboard') }}" class="w-full px-6 md:px-12 flex flex-col items-center max-w-[1200px]">

            <div class="relative w-full mb-8">
                <button type="submit" class="absolute left-6 top-1/2 -translate-y-1/2 cursor-pointer hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama cafe..." class="w-full bg-dineary-cream text-gray-700 placeholder-gray-400 rounded-full py-5 pl-16 pr-8 font-sans text-lg font-bold outline-none shadow-lg ring-0 border-0 focus:ring-4 focus:ring-white/20 transition-all">
            </div>

            <div class="flex flex-wrap items-center justify-center w-full gap-4 md:gap-6">

                <a href="{{ route('user.dashboard') }}" class="px-10 py-3 rounded-full font-sans font-bold text-[15px] transition-all cursor-pointer shadow-sm {{ !request('category') ? 'bg-dineary-yellow text-dineary-brown shadow-[0_4px_8px_rgba(0,0,0,0.2)]' : 'border border-dineary-cream text-dineary-cream hover:bg-dineary-cream hover:text-dineary-green' }}">
                    Semua
                </a>

                @foreach($categories->take(3) as $category)
                <a href="{{ route('user.dashboard', ['category' => $category->name]) }}" class="px-10 py-3 rounded-full font-sans font-bold text-[15px] transition-all cursor-pointer shadow-sm {{ request('category') == $category->name ? 'bg-dineary-yellow text-dineary-brown shadow-[0_4px_8px_rgba(0,0,0,0.2)]' : 'border border-dineary-cream text-dineary-cream hover:bg-dineary-cream hover:text-dineary-green' }}">
                    {{ $category->name }}
                </a>
                @endforeach

            </div>
        </form>

        <div class="w-full px-6 md:px-12 mt-16 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-[1440px] mx-auto justify-items-center">

                @forelse ($cafes as $cafe)
                <a href="{{ route('cafes.show', $cafe->id) }}" class="bg-dineary-cream rounded-[32px] p-5 flex flex-col shadow-md hover:shadow-xl transition-all cursor-pointer hover:-translate-y-2 duration-300 w-full max-w-[412px] h-[439px]">

                    <div class="relative w-full h-[210px] shrink-0 mb-4">
                        @if($cafe->photo)
                        <img src="{{ asset('storage/' . $cafe->photo) }}" alt="{{ $cafe->name }}" class="w-full h-full object-cover rounded-[24px]">
                        @else
                        <img src="{{ asset('images/Contoh Cafe.png') }}" alt="{{ $cafe->name }}" class="w-full h-full object-cover rounded-[24px]">
                        @endif

                        <div class="absolute top-4 right-4 bg-white px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="font-sans font-black text-[15px] text-black">{{ number_format($cafe->averageRating(), 1) }}</span>
                        </div>
                    </div>

                    <h3 class="font-heading font-bold text-[38px] text-dineary-brown leading-none mb-1 tracking-tight truncate">{{ $cafe->name }}</h3>
                    <p class="font-sans text-sm text-dineary-brown font-semibold mb-4 truncate">{{ $cafe->deskripsi_singkat }}</p>

                    <div class="flex gap-2 mb-auto flex-wrap h-[30px] overflow-hidden">
                        @foreach($cafe->categories->take(2) as $cat)
                        <span class="px-5 py-1.5 rounded-full bg-gradient-to-r from-dineary-yellow to-dineary-orange/60 text-dineary-brown font-sans text-[12px] font-bold whitespace-nowrap">
                            {{ $cat->name }}
                        </span>
                        @endforeach
                    </div>

                    <div class="flex justify-between items-center text-dineary-brown font-sans text-xs font-semibold px-1 mt-4">
                        <div class="flex items-center gap-1.5 w-[70%]">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="truncate">{{ $cafe->address }}</span>
                        </div>
                        <span class="flex-shrink-0">{{ $cafe->reviews->count() }} Review</span>
                    </div>

                </a>
                @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                    <p class="text-white font-sans text-xl font-bold">Yah, belum ada cafe yang sesuai pencarianmu :(</p>
                </div>
                @endforelse

            </div>
        </div>

        <div class="w-full flex justify-center items-center gap-4 px-6 mb-10">
            @if($cafes->onFirstPage())
            <span class="px-6 py-2.5 rounded-full bg-white/20 text-white/50 font-sans font-bold text-sm cursor-not-allowed">← Sebelumnya</span>
            @else
            <a href="{{ $cafes->previousPageUrl() }}" class="px-6 py-2.5 rounded-full bg-white hover:bg-dineary-yellow text-dineary-green hover:text-dineary-brown font-sans font-bold text-sm transition-colors shadow-md">← Sebelumnya</a>
            @endif

            <span class="text-white font-sans font-semibold text-sm">Hal {{ $cafes->currentPage() }} dari {{ $cafes->lastPage() }}</span>

            @if($cafes->hasMorePages())
            <a href="{{ $cafes->nextPageUrl() }}" class="px-6 py-2.5 rounded-full bg-white hover:bg-dineary-yellow text-dineary-green hover:text-dineary-brown font-sans font-bold text-sm transition-colors shadow-md">Selanjutnya →</a>
            @else
            <span class="px-6 py-2.5 rounded-full bg-white/20 text-white/50 font-sans font-bold text-sm cursor-not-allowed">Selanjutnya →</span>
            @endif
        </div>

    </main>

</body>

</html>