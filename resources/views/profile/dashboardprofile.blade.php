<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Dineary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#555E42] to-[#85926E] min-h-screen font-stack text-[#4A3B2C] relative overflow-x-hidden">

    <a href="{{ route('user.dashboard') }}" class="absolute top-6 left-6 md:top-8 md:left-8 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-[#FEFAF0] shadow-sm hover:scale-105 transition-all z-40 cursor-pointer border border-white/30">
        <svg class="w-6 h-6 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </a>

    <div class="w-full px-4 md:px-10 pt-24 pb-10 md:py-16 md:pt-28">

        <div class="bg-gradient-to-b from-[#FEFAF0] to-[#FFFFFF] rounded-[30px] md:rounded-[40px] p-8 md:p-12 shadow-2xl border border-white/50 w-full relative z-10">

            <div class="flex flex-col md:flex-row items-center md:items-start gap-8 border-b-2 border-[#E5DFD3] pb-10">
                <div class="w-36 h-36 bg-black rounded-full flex-shrink-0 flex items-center justify-center text-white shadow-md border-4 border-white">
                    <svg class="w-20 h-20 mt-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>

                <div class="flex-1 text-center md:text-left pt-2">
                    <h1 class="font-bagh font-black text-[45px] text-[#8B3B08] leading-none mb-1">{{ $user->name }}</h1>
                    <p class="font-stack font-bold text-[#716353] text-[16px]">{{ '@' . strtolower(explode(' ', $user->name)[0]) }} • {{ $user->email }}</p>

                    <p class="font-stack font-bold text-[#4A3B2C] text-[15px] mt-4 max-w-md">
                        Bergabung sejak {{ $user->created_at->format('F Y') }}. Penikmat kopi dan pencari suasana nyaman untuk bersantai maupun bekerja.
                    </p>

                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 mt-6">
                        <a href="{{ route('profile.edit') }}" class="bg-[#EAB86C] hover:bg-[#D9A35A] text-[#5A432D] font-bold px-8 py-3 rounded-full shadow-sm transition-transform hover:-translate-y-1">
                            Kelola Profil
                        </a>
                    </div>
                </div>

                <div class="border-2 border-[#7D8866] rounded-3xl p-6 flex flex-col items-center justify-center min-w-[160px] shadow-sm bg-white mt-4 md:mt-0">
                    <span class="font-stack font-bold text-[#7D8866] text-[14px] mb-1">Total review</span>
                    <span class="font-bagh font-black text-[60px] text-[#8B3B08] leading-none">{{ $user->reviews->count() }}</span>
                </div>
            </div>

            <div class="pt-10">
                <h2 class="font-bagh font-black text-[35px] text-[#8B3B08] leading-none mb-1">Ulasan Anda</h2>
                <p class="font-stack font-bold text-[#716353] text-[16px] mb-8">Riwayat ulasan yang pernah Anda bagikan di berbagai cafe</p>

                <div class="flex flex-col gap-6">
                    @forelse($user->reviews as $review)
                    <div class="bg-[#F8F4EB] rounded-[30px] p-6 shadow-sm border border-[#E5DFD3] flex flex-col md:flex-row gap-5 relative w-full hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-black rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>
                        <div class="flex-1 w-full">
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <p class="font-bagh font-black text-[#8B3B08] text-[22px] leading-tight">{{ $review->cafe->name ?? 'Cafe Tidak Diketahui' }}</p>
                                    <p class="font-stack font-bold text-[#716353] text-[14px]">Oleh Anda</p>
                                </div>
                                <p class="text-[13px] font-bold text-[#A6937D]">{{ $review->created_at->format('d F Y') }}</p>
                            </div>
                            <p class="text-[#4A3B2C] font-semibold text-[15px] mt-3">{{ $review->comment }}</p>
                        </div>
                        <div class="absolute bottom-6 right-6 flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-6 h-6 {{ $i <= $review->rating ? 'text-[#FDBA21]' : 'text-[#E5DFD3]' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-3xl p-8 text-center border-2 border-dashed border-[#E5DFD3]">
                        <p class="text-[#716353] font-bold">Anda belum pernah memberikan ulasan di cafe manapun.</p>
                        <a href="{{ route('user.dashboard') }}" class="text-[#8B3B08] underline mt-2 inline-block">Mulai jelajahi cafe sekarang!</a>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

</body>

</html>