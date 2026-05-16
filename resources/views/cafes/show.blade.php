<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cafe->name }} - Dineary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* CSS Trick untuk Bintang Rating di Form (Tanpa JS) */
        .star-rating-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 0.25rem;
        }

        .star-rating-input input {
            display: none;
        }

        .star-rating-input label {
            cursor: pointer;
            font-size: 2.5rem;
            color: #D1D5DB;
            transition: color 0.2s;
            line-height: 1;
        }

        .star-rating-input input:checked~label,
        .star-rating-input label:hover,
        .star-rating-input label:hover~label {
            color: #FDBA21;
        }
    </style>
</head>

<body class="bg-[#F3D58D] min-h-screen font-stack text-[#4A3B2C] relative pb-20 overflow-x-hidden">

    <div class="absolute top-0 left-0 w-full h-[45vh] z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-[#F3D58D]/40 to-[#F3D58D] z-10"></div>
        @if($cafe->photo)
        <img src="{{ asset('storage/' . $cafe->photo) }}" class="w-full h-full object-cover z-0" alt="{{ $cafe->name }}">
        @else
        <img src="{{ asset('images/Contoh Cafe.png') }}" class="w-full h-full object-cover z-0" alt="Placeholder">
        @endif
    </div>

    <a href="{{ auth()->check() ? route('user.dashboard') : route('home') }}" class="absolute top-8 left-8 w-12 h-12 bg-[#8B3B08] rounded-full flex items-center justify-center text-white shadow-lg hover:scale-105 transition-transform z-50 cursor-pointer">
        <svg class="w-6 h-6 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </a>

    <main class="relative z-20 w-full pt-[25vh] px-0 md:px-6 lg:px-12">

        @if(session('success'))
        <div class="bg-[#D1E7DD] border-l-4 border-[#0F5132] text-[#0F5132] p-4 rounded-r-lg shadow-sm font-bold mb-4 mx-4 md:mx-0">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-[#F8D7DA] border-l-4 border-[#842029] text-[#842029] p-4 rounded-r-lg shadow-sm font-bold mb-4 mx-4 md:mx-0">
            {{ session('error') }}
        </div>
        @endif

        <div class="bg-[#FEFAF0] rounded-none md:rounded-[40px] p-8 md:p-12 shadow-xl mb-12 relative border border-white/50 w-full">

            <div class="absolute top-8 right-8 border-2 border-[#E5DFD3] rounded-2xl px-5 py-2 hidden md:flex flex-col items-center bg-white shadow-sm">
                <span class="flex items-center gap-1.5 font-black text-2xl text-[#1F1F1F]">
                    <svg class="w-6 h-6 text-[#FDBA21]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    {{ number_format($cafe->averageRating(), 1) }}
                </span>
                <span class="text-[11px] text-[#716353] font-bold mt-1">Dari {{ $cafe->reviews->count() }} Penilai</span>
            </div>

            <div class="md:pr-32">
                <div class="flex items-center gap-4 mb-2">
                    <h1 class="font-bagh font-black text-[55px] md:text-[65px] text-[#A04818] leading-none">{{ $cafe->name }}</h1>
                    @auth
                    <form method="POST" action="{{ route('bookmarks.toggle', $cafe->id) }}" class="m-0 mt-2">
                        @csrf
                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 p-2.5 rounded-full shadow-sm transition-colors cursor-pointer border border-red-200" title="Tambah ke Favorit">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </button>
                    </form>
                    @endauth
                </div>

                <div class="flex items-center gap-1.5 text-[#716353] font-bold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>{{ $cafe->address }}</span>
                </div>
            </div>

            <div class="flex md:hidden border-2 border-[#E5DFD3] rounded-2xl px-5 py-3 mb-6 items-center gap-4 bg-white shadow-sm w-fit">
                <span class="flex items-center gap-1.5 font-black text-2xl text-[#1F1F1F]">
                    <svg class="w-6 h-6 text-[#FDBA21]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    {{ number_format($cafe->averageRating(), 1) }}
                </span>
                <span class="text-sm text-[#716353] font-bold border-l-2 border-[#E5DFD3] pl-4">Dari {{ $cafe->reviews->count() }} Penilai</span>
            </div>

            <p class="font-stack font-bold text-[#4A3B2C] text-[20px] mb-2">{{ $cafe->deskripsi_singkat }}</p>
            <p class="font-stack text-[#716353] text-[16px] mb-8 leading-relaxed">{{ $cafe->description }}</p>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-5 rounded-2xl border border-[#E5DFD3] shadow-sm">
                    <p class="text-[13px] text-gray-500 font-bold mb-1">Jam Operasional</p>
                    <p class="font-black text-[#A04818] text-lg">{{ $cafe->open_hours }}</p>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-[#E5DFD3] shadow-sm">
                    <p class="text-[13px] text-gray-500 font-bold mb-1">Kisaran Harga</p>
                    <p class="font-black text-[#A04818] text-lg">{{ $cafe->price_range }}</p>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-[#E5DFD3] shadow-sm col-span-2 md:col-span-1">
                    <p class="text-[13px] text-gray-500 font-bold mb-1">Telepon</p>
                    <p class="font-black text-[#A04818] text-lg">{{ $cafe->phone }}</p>
                </div>
            </div>

            <div class="mt-6">
                <p class="font-black text-[#A04818] text-[16px] mb-4">Keunggulan:</p>
                <div class="flex flex-wrap gap-3">
                    @foreach($cafe->categories as $cat)
                    <span class="px-8 py-2.5 rounded-full border border-[#A04818] text-[#A04818] font-bold text-[15px] bg-white/50">
                        {{ $cat->name }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>

        @if($cafe->menus && $cafe->menus->count() > 0)
        <div class="mb-12 px-4 md:px-0">
            <h2 class="font-bagh font-black text-[35px] text-[#A04818] uppercase tracking-wider mb-6 drop-shadow-sm">Menu Andalan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cafe->menus as $menu)
                <div class="bg-[#FEFAF0] p-6 rounded-2xl shadow-md border border-white/50 flex flex-col justify-between h-full">
                    <div class="mb-4">
                        <p class="font-black text-[#4A3B2C] text-[20px]">{{ $menu->name }}</p>
                        <p class="text-[15px] text-gray-500 mt-1">{{ $menu->description }}</p>
                    </div>
                    <span class="font-bold text-[#A04818] bg-white px-4 py-2 rounded-xl shadow-sm border border-[#E5DFD3] w-fit">{{ $menu->price }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mb-12 px-4 md:px-0">
            <div class="mb-8">
                <h2 class="font-bagh font-black text-[40px] text-[#A04818] uppercase tracking-wider leading-none drop-shadow-sm mb-2">ULASAN PELANGGAN</h2>
                <p class="font-bold text-[#4A3B2C] text-lg">Lihat ({{ $cafe->reviews->count() }}) ulasan lainnya</p>
            </div>

            <div class="flex flex-col gap-6">
                @forelse($cafe->reviews as $review)
                <div class="bg-[#FEFAF0] rounded-[30px] p-8 shadow-md border border-white/50 flex flex-col md:flex-row gap-6 relative w-full">

                    <div class="w-16 h-16 bg-black rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>

                    <div class="flex-1 w-full">
                        <div class="flex justify-between items-start mb-2">
                            <p class="font-black text-[#A04818] text-[20px]">{{ $review->user->name ?? 'Pengguna' }}</p>
                            <p class="text-[13px] font-bold text-[#716353]">{{ $review->created_at->format('d F Y') }}</p>
                        </div>

                        <p class="text-[#4A3B2C] font-semibold text-[16px] mb-4">{{ $review->comment }}</p>

                        @if($review->photos && $review->photos->count() > 0)
                        <div class="flex flex-wrap gap-3 mt-4">
                            @foreach($review->photos as $photo)
                            <img src="{{ asset('storage/' . $photo->photo_path) }}" class="w-36 h-28 object-cover rounded-xl border border-gray-200">
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="absolute bottom-8 right-8 flex gap-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <=$review->rating)
                            <svg class="w-7 h-7 text-[#FDBA21]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @else
                            <svg class="w-7 h-7 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endif
                            @endfor
                    </div>

                    @auth
                    @if(auth()->id() === $review->user_id)
                    <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="absolute top-6 right-6 m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus ulasan ini?')" class="text-red-400 hover:text-red-600 font-bold text-sm bg-red-50 px-3 py-1.5 rounded-lg border border-red-100">Hapus</button>
                    </form>
                    @endif
                    @endauth

                </div>
                @empty
                <div class="bg-[#FEFAF0] rounded-[30px] p-10 text-center shadow-md border border-white/50 text-[#716353] font-bold text-lg w-full">
                    Belum ada ulasan untuk cafe ini. Jadilah yang pertama!
                </div>
                @endforelse
            </div>
        </div>

        <div class="bg-[#FEFAF0] rounded-none md:rounded-[40px] p-8 md:p-12 shadow-xl relative border border-white/50 w-full mb-10">
            <h2 class="font-bagh font-black text-[40px] text-[#A04818] uppercase tracking-wider text-center mb-10 drop-shadow-sm">BERIKAN ULASAN ANDA</h2>

            @auth
            <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data" class="flex flex-col gap-8 w-full">
                @csrf
                <input type="hidden" name="cafe_id" value="{{ $cafe->id }}">

                <div class="flex flex-col gap-2">
                    <label class="font-black text-[#A04818] text-[16px]">Rating anda</label>
                    <div class="star-rating-input justify-start w-fit">
                        <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" title="5 Bintang">★</label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 Bintang">★</label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 Bintang">★</label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 Bintang">★</label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 Bintang">★</label>
                    </div>
                    @error('rating') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-black text-[#A04818] text-[16px]">Ulasan anda</label>
                    <textarea name="comment" required rows="5" placeholder="Ceritakan pengalaman anda..." class="w-full bg-white border border-[#D1C9BB] rounded-[24px] px-6 py-5 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-inner resize-none text-[#4A3B2C] font-semibold text-lg">{{ old('comment') }}</textarea>
                    @error('comment') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center mt-2 gap-6">
                    <div class="relative overflow-hidden inline-block cursor-pointer w-full md:w-auto">
                        <button type="button" class="w-full md:w-auto bg-[#879679] hover:bg-[#6c7861] text-white font-bold py-4 px-8 rounded-2xl flex items-center justify-center gap-2 shadow-sm transition-colors cursor-pointer pointer-events-none text-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Tambahkan Foto
                        </button>
                        <input type="file" name="photo" accept="image/*" class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                    </div>

                    <button type="submit" class="w-full md:w-auto bg-[#FDBA21] hover:bg-[#EAA81B] text-white font-black text-xl py-4 px-12 rounded-full shadow-md hover:scale-105 transition-transform cursor-pointer">
                        Kirim Ulasan
                    </button>
                </div>
                @error('photo') <span class="text-red-500 text-sm font-semibold mt-1">{{ $message }}</span> @enderror

            </form>
            @else
            <div class="text-center py-8">
                <p class="font-bold text-[#716353] text-lg mb-6">Anda harus masuk (login) terlebih dahulu untuk menulis ulasan.</p>
                <a href="{{ route('login') }}" class="inline-block bg-[#FDBA21] hover:bg-[#EAA81B] text-white font-black text-xl py-4 px-12 rounded-full shadow-md hover:scale-105 transition-transform cursor-pointer">
                    Login Sekarang
                </a>
            </div>
            @endauth
        </div>

    </main>

</body>

</html>