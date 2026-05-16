<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Dineary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#EBE2D3] min-h-screen font-stack text-[#4A3B2C] overflow-x-hidden">

    <nav class="w-full bg-[#5C6447] px-8 py-4 flex justify-between items-center z-50 shadow-md">
        <div class="flex items-center gap-4">
            <div class="bg-[#FDBA21] p-2 rounded-lg">
                <img src="{{ asset('images/Logo D Coklat.png') }}" alt="Logo Admin" class="w-6 h-6 object-contain invert brightness-0">
            </div>
            <span class="text-white font-bagh font-bold text-2xl tracking-wide mt-1">Dashboard Admin</span>
        </div>

        <div class="flex items-center gap-6">
            <span class="text-[#D3D6C8] font-bold text-sm hidden md:block">Selamat datang, {{ auth('admin')->user()->name ?? 'Admin' }}!</span>
            <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                @csrf
                <button type="submit" class="bg-red-500/20 hover:bg-red-500 text-red-100 hover:text-white px-4 py-2 rounded-lg font-bold text-sm transition-colors cursor-pointer border border-red-500/50">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-[1300px] mx-auto px-6 py-10 flex flex-col gap-10">

        @if(session('success'))
        <div class="bg-[#D1E7DD] border-l-4 border-[#0F5132] text-[#0F5132] p-4 rounded-r-lg shadow-sm font-bold">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-[#F8D7DA] border-l-4 border-[#842029] text-[#842029] p-4 rounded-r-lg shadow-sm font-bold">
            {{ session('error') }}
        </div>
        @endif

        <div class="bg-[#FAF6ED] rounded-[24px] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.05)] w-full">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#1F1F1F]">Kelola Cafe</h2>
                <a href="{{ route('admin.cafes.create') }}" class="bg-[#FDBA21] hover:bg-[#EAA81B] text-white font-bold py-2.5 px-6 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Cafe
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-[#E5DFD3] text-[#716353] text-[15px]">
                            <th class="py-4 px-3 font-bold">Nama Cafe</th>
                            <th class="py-4 px-3 font-bold">Kategori</th>
                            <th class="py-4 px-3 font-bold">Alamat</th>
                            <th class="py-4 px-3 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cafes as $cafe)
                        <tr class="border-b border-[#E5DFD3]/60 hover:bg-[#F0EBE1] transition-colors text-[15px] text-[#4A3B2C] font-semibold">
                            <td class="py-4 px-3">{{ $cafe->name }}</td>
                            <td class="py-4 px-3">{{ $cafe->categories->pluck('name')->join(', ') }}</td>
                            <td class="py-4 px-3">{{ $cafe->address }}</td>
                            <td class="py-4 px-3 flex justify-center gap-4">
                                <a href="{{ route('admin.cafes.edit', $cafe->id) }}" class="text-gray-500 hover:text-blue-600 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.cafes.destroy', $cafe->id) }}" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus cafe ini?')" class="text-red-500 hover:text-red-700 transition-colors cursor-pointer" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-gray-500 font-medium italic">Belum ada data cafe.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-[#FAF6ED] rounded-[24px] p-8 shadow-[0_8px_30px_rgba(0,0,0,0.05)] w-full mb-10">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#1F1F1F]">Kelola Review</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-[#E5DFD3] text-[#716353] text-[15px]">
                            <th class="py-4 px-3 font-bold">Cafe</th>
                            <th class="py-4 px-3 font-bold">Pengguna</th>
                            <th class="py-4 px-3 font-bold">Rating</th>
                            <th class="py-4 px-3 font-bold">Komentar</th>
                            <th class="py-4 px-3 font-bold">Waktu</th>
                            <th class="py-4 px-3 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr class="border-b border-[#E5DFD3]/60 hover:bg-[#F0EBE1] transition-colors text-[15px] text-[#4A3B2C] font-semibold">
                            <td class="py-4 px-3">{{ $review->cafe->name ?? '-' }}</td>
                            <td class="py-4 px-3">{{ $review->user->name ?? 'Pengguna' }}</td>

                            <td class="py-4 px-3">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-[#FDBA21]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span>{{ $review->rating }}</span>
                                </div>
                            </td>

                            <td class="py-4 px-3 max-w-xs truncate" title="{{ $review->comment }}">{{ $review->comment }}</td>
                            <td class="py-4 px-3 text-gray-500 text-sm">{{ $review->created_at->format('d M Y') }}</td>

                            <td class="py-4 px-3 flex justify-center">
                                <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus review ini?')" class="text-red-500 hover:text-red-700 transition-colors cursor-pointer" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500 font-medium italic">Belum ada data review.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

</html>