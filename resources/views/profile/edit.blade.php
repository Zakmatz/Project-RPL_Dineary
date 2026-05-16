<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Dineary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dineary-cream antialiased">

    <nav class="w-full bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-dineary-cream">
        <div class="max-w-[1440px] mx-auto flex justify-between items-center px-10 py-4">
            <a href="{{ route('user.dashboard') }}">
                <img src="{{ asset('images/Logo D Coklat.png') }}" alt="Logo" class="w-[45px] h-[42px] object-contain">
            </a>

            <a href="{{ route('profile.dashboard') }}" class="font-sans font-bold text-dineary-brown hover:underline">
                ← Kembali ke Profile
            </a>
        </div>
    </nav>

    <main class="max-w-[800px] mx-auto py-16 px-6">
        <h1 class="font-heading font-black text-dineary-brown text-4xl mb-8 uppercase">Pengaturan Profil</h1>

        <div class="flex flex-col gap-8">

            <div class="bg-white p-8 rounded-[32px] shadow-sm border border-gray-100">
                <h2 class="font-heading font-bold text-dineary-green text-xl mb-6">Informasi Akun</h2>
                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <label class="block font-sans font-bold text-dineary-brown mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full bg-dineary-cream border-none rounded-xl py-3 px-4 font-sans font-bold focus:ring-2 focus:ring-dineary-yellow">
                    </div>

                    <div>
                        <label class="block font-sans font-bold text-dineary-brown mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full bg-dineary-cream border-none rounded-xl py-3 px-4 font-sans font-bold focus:ring-2 focus:ring-dineary-yellow">
                    </div>

                    <button type="submit" class="bg-dineary-brown text-white font-sans font-bold px-8 py-3 rounded-xl hover:bg-orange-950 transition-all cursor-pointer">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

            <div class="bg-red-50 p-8 rounded-[32px] border border-red-100">
                <h2 class="font-heading font-bold text-red-700 text-xl mb-2">Hapus Akun</h2>
                <p class="font-sans text-sm text-red-600 mb-6">Setelah akun Anda dihapus, semua data akan hilang secara permanen.</p>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-6">
                        <label class="block font-sans font-bold text-red-700 mb-2">Konfirmasi Password Anda</label>
                        <input type="password" name="password" placeholder="Masukkan password untuk konfirmasi" required class="w-full bg-white border-red-200 rounded-xl py-3 px-4 font-sans focus:ring-red-500">
                        @error('password', 'userDeletion') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak bisa dibatalkan.')" class="bg-red-600 text-white font-sans font-bold px-8 py-3 rounded-xl hover:bg-red-800 transition-all cursor-pointer">
                        Hapus Akun Selamanya
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>

</html>