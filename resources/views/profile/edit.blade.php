<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile - Dineary</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <a href="{{ route('home') }}">← Kembali ke Beranda</a>

    @if(session('status') === 'profile-updated')
        <p style="color:green">Profile berhasil diperbarui!</p>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Foto Profil --}}
        <div>
            @if($user->foto_user)
                <img src="{{ asset('storage/'.$user->foto_user) }}" width="100" style="border-radius:50%">
            @endif
            <label>Foto Profil:</label>
            <input type="file" name="foto_user" accept="image/*">
        </div>

        {{-- Nama --}}
        <div>
            <label>Nama:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>

        {{-- Username --}}
        <div>
            <label>Username:</label>
            <input type="text" name="username" value="{{ $user->username }}">
        </div>

        {{-- Email --}}
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        {{-- Bio --}}
        <div>
            <label>Bio:</label>
            <textarea name="bio" placeholder="Ceritakan sedikit tentang dirimu...">{{ $user->bio }}</textarea>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <hr>

    {{-- Hapus Akun --}}
    <h2>Hapus Akun</h2>
    <p style="color:red">Perhatian: Aksi ini tidak dapat dibatalkan!</p>
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')
        <div>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" onclick="return confirm('Yakin ingin hapus akun?')" style="color:red">Hapus Akun</button>
    </form>
</body>
</html>