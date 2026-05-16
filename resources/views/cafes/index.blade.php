<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dineary - Beranda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dineary-cream antialiased overflow-x-hidden">

    <header class="w-full flex flex-col">

        <div class="w-full bg-dineary-cream relative z-20 pb-28">

            <nav class="w-full flex justify-between items-center px-10 py-6">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/Logo D Coklat.png') }}" alt="Logo" class="w-[55px] h-[52px] object-contain">
                </a>

                <div class="flex items-center gap-4">
                    @auth
                    <span class="font-sans font-bold text-dineary-brown hidden md:block">Halo, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="bg-red-500/10 hover:bg-red-500 text-red-600 hover:text-white border border-red-500 font-sans text-sm font-bold px-6 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all cursor-pointer">
                            Keluar
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="bg-dineary-brown text-white font-sans text-lg font-bold px-8 py-2.5 rounded-xl shadow-md hover:scale-105 transition-transform inline-block">
                        Masuk
                    </a>
                    @endauth
                </div>
            </nav>

            <div class="w-full max-w-[1440px] mx-auto flex justify-center items-center gap-32 px-4 -mt-10 -mb-24">
                <img src="{{ asset('images/Croissant.png') }}" class="w-full max-w-[350px] object-contain hover:-translate-y-2 transition-transform duration-300" alt="Croissant">
                <img src="{{ asset('images/Biskuit.png') }}" class="w-full max-w-[350px] object-contain hover:-translate-y-2 transition-transform duration-300" alt="Pretzel">
                <img src="{{ asset('images/Sourdough.png') }}" class="w-full max-w-[350px] object-contain hover:-translate-y-2 transition-transform duration-300" alt="Sourdough">
            </div>

        </div>

        <div class="relative w-full flex flex-col items-center justify-center py-20">

            <img src="{{ asset('images/Gambar Roti.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-multiply" alt="Background Roti">
            <div class="absolute inset-0 bg-gradient-to-b from-dineary-cream to-transparent opacity-80"></div>

            <div class="relative z-10 flex flex-col items-center text-center px-4">

                <h1 class="font-heading font-bold text-transparent bg-clip-text bg-gradient-to-b from-dineary-green to-gray-700 text-6xl md:text-[85px] leading-[0.85] uppercase max-w-[818px] drop-shadow-sm mb-6">
                    TEMUKAN CAFE<br>FAVORITMU
                </h1>

                <p class="font-sans font-bold text-transparent bg-clip-text bg-gradient-to-b from-dineary-brown to-black text-[15px] max-w-[645px] leading-tight mb-8">
                    Jelajahi berbagai pilihan cafe dan toko roti terbaik di sekitarmu.<br>Temukan suasana nyaman untuk bekerja atau sekadar bersantai bersama teman.
                </p>

                @guest
                <a href="{{ route('register') }}" class="bg-gradient-to-b from-dineary-brown to-orange-950 text-white font-sans font-bold text-[22px] w-[251px] h-[69px] rounded-full flex items-center justify-center shadow-xl hover:scale-105 transition-transform">
                    Daftar
                </a>
                @endguest

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

        <form method="GET" action="{{ route('cafes.index') }}" class="w-full px-6 md:px-12 flex flex-col items-center max-w-[1200px]">

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

                <a href="{{ route('cafes.index') }}" class="px-10 py-3 rounded-full font-sans font-bold text-[15px] transition-all cursor-pointer shadow-sm {{ !request('category') ? 'bg-dineary-yellow text-dineary-brown shadow-[0_4px_8px_rgba(0,0,0,0.2)]' : 'border border-dineary-cream text-dineary-cream hover:bg-dineary-cream hover:text-dineary-green' }}">
                    Semua
                </a>

                @foreach($categories->take(3) as $category)
                <a href="{{ route('cafes.index', ['category' => $category->name]) }}" class="px-10 py-3 rounded-full font-sans font-bold text-[15px] transition-all cursor-pointer shadow-sm {{ request('category') == $category->name ? 'bg-dineary-yellow text-dineary-brown shadow-[0_4px_8px_rgba(0,0,0,0.2)]' : 'border border-dineary-cream text-dineary-cream hover:bg-dineary-cream hover:text-dineary-green' }}">
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
                        
                        <img src="{{$cafe->photo}}" alt="{{ $cafe->name }}" class="w-full h-full object-cover rounded-[24px]">
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