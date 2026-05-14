<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dineary - Beranda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dineary-cream-light antialiased">

    <!-- HEADER / HERO SECTION FULL -->
    <header class="w-full flex flex-col">

        <!-- BAGIAN ATAS: NAV & ROTI (Background Solid Cream) -->
        <div class="w-full bg-dineary-cream-light relative z-20 pb-28">

            <!-- Navbar -->
            <nav class="w-full flex justify-between items-center px-10 py-6">
                <!-- Logo: Ukuran 44x42 sesuai request -->
                <a href="/">
                    <img src="{{ asset('images/Logo D Coklat.png') }}" alt="Logo" class="w-[55px] h-[52px] object-contain">
                </a>

                <!-- Tombol Masuk: Pakai Stack Sans -->
                <div>
                    @guest
                    <a href="{{ route('login') }}" class="bg-dineary-brown text-white font-stack text-lg font-bold px-8 py-2.5 rounded-xl shadow-md hover-pop inline-block">
                        Masuk
                    </a>
                    @endguest
                </div>
            </nav>

            <!-- 3 Gambar Roti: Ukuran digedein sampai fulfill -->
            <div class="w-full max-w-[1440px] mx-auto flex justify-center items-center gap-32 px-4 -mt-10 -mb-24">
                <img src="{{ asset('images/Croissant.png') }}" class="w-full max-w-[350px] object-contain hover-pop" alt="Croissant">
                <img src="{{ asset('images/Biskuit.png') }}" class="w-full max-w-[350px] object-contain hover-pop" alt="Pretzel">
                <img src="{{ asset('images/Sourdough.png') }}" class="w-full max-w-[350px] object-contain hover-pop" alt="Sourdough">
            </div>

        </div>

        <!-- BAGIAN BAWAH: TEKS & TOMBOL (Background Gambar Faded) -->
        <div class="relative w-full flex flex-col items-center justify-center py-20">

            <!-- Background Image di belakang teks -->
            <img src="{{ asset('images/Gambar Roti.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-multiply" alt="Background Roti">
            <!-- Overlay gradasi putih agar teks terbaca -->
            <div class="absolute inset-0 bg-gradient-to-b from-dineary-cream-light to-transparent opacity-80"></div>

            <div class="relative z-10 flex flex-col items-center text-center px-4">

                <!-- Judul Besar Hijau -->
                <h1 class="font-bagh font-bold text-transparent bg-clip-text bg-gradient-to-b from-dineary-olive to-[#5A5D46] text-7xl md:text-[85px] leading-[0.85] uppercase max-w-[818px] drop-shadow-sm mb-6">
                    TEMUKAN CAFE<br>FAVORITMU
                </h1>

                <!-- Deskripsi Cokelat -->
                <p class="font-stack font-bold text-transparent bg-clip-text bg-gradient-to-b from-dineary-brown to-[#5C2705] text-[15px] max-w-[645px] leading-tight mb-8">
                    Jelajahi berbagai pilihan cafe dan toko roti terbaik di sekitarmu.<br>Temukan suasana nyaman untuk bekerja atau sekadar bersantai bersama teman.
                </p>

                <!-- Tombol Daftar -->
                @guest
                <a href="{{ route('register') }}" class="bg-gradient-to-b from-dineary-brown to-[#5C2705] text-white font-stack font-bold text-[22px] w-[251px] h-[69px] rounded-full flex items-center justify-center shadow-xl hover-pop">
                    Daftar
                </a>
                @endguest

            </div>
        </div>

    </header>

    <!-- SECTION PILIHAN TOKO -->
    <main class="w-full bg-dineary-olive py-20 flex flex-col items-center">

        <h2 class="font-bagh text-[55px] md:text-[65px] font-black text-[#EAD09E] uppercase tracking-wider mb-2 drop-shadow-md text-center" style="-webkit-text-stroke: 1px #EAD09E;">
            PILIHAN TOKO
        </h2>
        <p class="font-stack text-dineary-cream-light text-[15px] font-bold mb-10 tracking-wide text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
        </p>

        <div class="w-full px-6 md:px-12 flex flex-col">

            <div class="relative w-full mb-6">
                <svg class="absolute left-6 top-1/2 -translate-y-1/2 w-7 h-7 text-[#C2B29A]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Cari nama cafe" class="w-full bg-dineary-cream-light text-[#A6937D] placeholder-[#C2B29A] rounded-full py-5 pl-16 pr-8 font-stack text-lg font-bold outline-none shadow-lg ring-0 border-0 focus:ring-4 focus:ring-white/20 transition-all">
            </div>

            <div class="flex items-center w-full gap-8 mt-4">

                <button class="flex-shrink-0 cursor-pointer hover:scale-110 transition-transform pb-1 text-dineary-cream-light translate-x-6">
                    <svg width="42" height="32" viewBox="0 0 24 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="1" y1="4" x2="4" y2="4"></line>
                        <circle cx="7" cy="4" r="2" fill="currentColor"></circle>
                        <line x1="10" y1="4" x2="23" y2="4"></line>

                        <line x1="1" y1="10" x2="15" y2="10"></line>
                        <circle cx="18" cy="10" r="2" fill="currentColor"></circle>
                        <line x1="21" y1="10" x2="23" y2="10"></line>

                        <line x1="1" y1="16" x2="4" y2="16"></line>
                        <circle cx="7" cy="16" r="2" fill="currentColor"></circle>
                        <line x1="10" y1="16" x2="23" y2="16"></line>
                    </svg>
                </button>

                <div class="flex flex-wrap items-center gap-8 ml-6">

                    <button class="px-12 py-3 rounded-full bg-[#EAB86C] text-[#5A432D] font-stack font-bold text-[15px] shadow-[0_4px_8px_rgba(0,0,0,0.2)] hover:scale-105 transition-transform cursor-pointer">
                        Kategori
                    </button>

                    @for ($i = 0; $i < 6; $i++)
                        <button class="px-12 py-3 rounded-full border border-dineary-cream-light text-dineary-cream-light font-stack font-bold text-[15px] hover:bg-dineary-cream-light hover:text-dineary-olive transition-colors cursor-pointer">
                        Kategori
                        </button>
                        @endfor

                </div>
            </div>
        </div>

        @php
        $dummyCafes = [
        ['name' => 'Teman Kerja', 'img' => asset('images/Contoh Cafe.png')],
        ['name' => 'Nycto', 'img' => asset('images/Contoh Cafe.png')],
        ['name' => 'Burjo Priangan 3', 'img' => asset('images/Contoh Cafe.png')],
        ['name' => 'Nasi Kuning Pasundan I', 'img' => asset('images/Contoh Cafe.png')],
        ['name' => 'Padang Murah', 'img' => asset('images/Contoh Cafe.png')],
        ['name' => 'Pancong Indonesia', 'img' => asset('images/Contoh Cafe.png')],
        ];
        @endphp

        <!-- Grid Container -->
        <div class="w-full px-6 md:px-12 mt-16 pb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-[1440px] mx-auto justify-items-center">

                <!-- Looping Data Dummy -->
                @foreach ($dummyCafes as $cafe)
                <!-- Kotak Card: Ukuran dikunci strict 412x439 -->
                <div class="bg-dineary-cream-light rounded-[32px] p-5 flex flex-col shadow-md hover:shadow-xl transition-all cursor-pointer hover:-translate-y-2 duration-300 w-full max-w-[412px] h-[439px]">

                    <!-- Gambar & Rating Badge: Tinggi gambar dikunci di 210px -->
                    <div class="relative w-full h-[210px] shrink-0 mb-4">
                        <!-- object-cover memastikan gambar terpotong rapi menyesuaikan kotak -->
                        <img src="{{ $cafe['img'] }}" alt="{{ $cafe['name'] }}" class="w-full h-full object-cover rounded-[24px]">

                        <!-- Badge Bintang -->
                        <div class="absolute top-4 right-4 bg-white px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-[#FFC107]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="font-stack font-black text-[15px] text-black">5.0</span>
                        </div>
                    </div>

                    <!-- Informasi Judul -->
                    <h3 class="font-bagh font-bold text-[38px] text-[#8B3B08] leading-none mb-1 tracking-tight truncate">{{ $cafe['name'] }}</h3>
                    <p class="font-stack text-sm text-[#713B17] font-semibold mb-4 truncate">Lorem ipsum dolor sit amet</p>

                    <!-- Kategori -->
                    <div class="flex gap-3 mb-auto">
                        <span class="px-6 py-1.5 rounded-full bg-gradient-to-r from-[#EAB86C] to-[#EAD09E]/40 text-[#713B17] font-stack text-[13px] font-bold">Kategori</span>
                        <span class="px-6 py-1.5 rounded-full bg-gradient-to-r from-[#EAB86C] to-[#EAD09E]/40 text-[#713B17] font-stack text-[13px] font-bold">Kategori</span>
                    </div>

                    <!-- Footer (Ikon Pin & Review) -->
                    <div class="flex justify-between items-center text-[#713B17] font-stack text-xs font-semibold px-1 mt-4">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Lokasi</span>
                        </div>
                        <span>123 Review</span>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </main>

</body>

</html>