<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Cafe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#EBE2D3] min-h-screen font-stack text-[#4A3B2C] pb-20">

    <nav class="w-full bg-[#5C6447] px-8 py-4 flex justify-between items-center z-50 shadow-md sticky top-0">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/dineary logo.png') }}" alt="Logo Dineary" class="h-8 object-contain" style="filter: brightness(0) saturate(100%) invert(75%) sepia(51%) saturate(1054%) hue-rotate(352deg) brightness(103%) contrast(104%);">
            <span class="text-white font-stack font-semibold text-lg border-l border-white/30 pl-4 ml-2">Admin Panel</span>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-[#D3D6C8] hover:text-white font-bold text-sm transition-colors cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Dashboard
        </a>
    </nav>

    <main class="max-w-[1000px] mx-auto px-6 mt-10">

        <div class="bg-[#FAF6ED] rounded-[24px] p-10 shadow-[0_8px_30px_rgba(0,0,0,0.05)] w-full">

            <div class="border-b-2 border-[#E5DFD3] pb-6 mb-8">
                <h1 class="font-bagh font-bold text-4xl text-[#1F1F1F]">Edit Data Cafe</h1>
                <p class="text-[#716353] mt-2 font-medium">Perbarui informasi untuk <strong>{{ $cafe->name }}</strong> di bawah ini.</p>
            </div>

            <form method="POST" action="{{ route('admin.cafes.update', $cafe->id) }}" enctype="multipart/form-data" class="flex flex-col gap-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <label class="font-bold text-[#4A3B2C]">Nama Cafe <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $cafe->name) }}" required class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] focus:border-transparent transition-all shadow-sm">
                            @error('name') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-bold text-[#4A3B2C]">Deskripsi Singkat</label>
                            <input type="text" name="deskripsi_singkat" value="{{ old('deskripsi_singkat', $cafe->deskripsi_singkat) }}" placeholder="Contoh: Tempat nyaman buat nugas..." class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm placeholder-gray-400">
                        </div>

                        <div class="flex flex-col gap-3 mt-2">
                            <label class="font-bold text-[#4A3B2C]">Kategori Cafe</label>
                            <div class="flex flex-wrap gap-3">
                                @foreach($categories as $category)
                                <label class="flex items-center gap-2 cursor-pointer bg-white border border-[#D1C9BB] px-4 py-2 rounded-lg hover:border-[#FDBA21] transition-colors has-[:checked]:bg-[#FDBA21]/10 has-[:checked]:border-[#FDBA21]">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="w-4 h-4 text-[#FDBA21] focus:ring-[#FDBA21] rounded border-gray-300" {{ $cafe->categories->contains($category->id) ? 'checked' : '' }}>
                                    <span class="font-semibold text-sm">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <label class="font-bold text-[#4A3B2C]">Nomor Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $cafe->phone) }}" placeholder="0812-xxxx-xxxx" class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm placeholder-gray-400">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-bold text-[#4A3B2C]">Sosial Media (Instagram)</label>
                            <input type="text" name="sosmed" value="{{ old('sosmed', $cafe->sosmed) }}" placeholder="@akun_cafe" class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm placeholder-gray-400">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="font-bold text-[#4A3B2C]">Jam Operasional</label>
                                <input type="text" name="open_hours" value="{{ old('open_hours', $cafe->open_hours) }}" placeholder="08.00 - 22.00" class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm placeholder-gray-400">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="font-bold text-[#4A3B2C]">Kisaran Harga</label>
                                <select name="price_range" class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm">
                                    <option value="" disabled>Pilih Harga</option>
                                    <option value="Murah" {{ old('price_range', $cafe->price_range) == 'Murah' ? 'selected' : '' }}>Murah</option>
                                    <option value="Sedang" {{ old('price_range', $cafe->price_range) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                    <option value="Mahal" {{ old('price_range', $cafe->price_range) == 'Mahal' ? 'selected' : '' }}>Mahal</option>
                                </select>
                                @error('price_range') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-5 mt-2">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-[#4A3B2C]">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="address" required rows="2" placeholder="Jl. Contoh No. 123..." class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm resize-none">{{ old('address', $cafe->address) }}</textarea>
                        @error('address') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-[#4A3B2C]">Deskripsi Lengkap</label>
                        <textarea name="description" rows="4" placeholder="Ceritakan detail tentang suasana, menu andalan, fasilitas cafe..." class="w-full bg-white border border-[#D1C9BB] rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#FDBA21] transition-all shadow-sm resize-none">{{ old('description', $cafe->description) }}</textarea>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-bold text-[#4A3B2C]">Ganti Foto Cafe (Opsional)</label>
                    <div class="w-full border-2 border-dashed border-[#D1C9BB] rounded-xl p-8 flex flex-col items-center justify-center bg-white/50 hover:bg-white transition-colors">
                        <svg class="w-10 h-10 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <input type="file" name="photo" accept="image/*" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FDBA21]/10 file:text-[#8B6B15] hover:file:bg-[#FDBA21]/20 cursor-pointer">
                        <p class="text-xs text-gray-400 mt-2 font-medium">Format: JPG, PNG (Max 2MB). <span class="text-[#FDBA21]">Biarkan kosong jika tidak ingin mengubah foto.</span></p>
                    </div>
                    @error('photo') <span class="text-red-500 text-sm font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end mt-6 border-t-2 border-[#E5DFD3] pt-6">
                    <button type="submit" class="bg-[#5C6447] hover:bg-[#4A5138] text-white font-bold text-lg py-3 px-10 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Update Cafe
                    </button>
                </div>

            </form>
        </div>
    </main>

</body>

</html>