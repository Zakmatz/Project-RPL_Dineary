<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Dineary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative w-full h-screen overflow-hidden bg-[#FDF5E6]">

    <!-- DEKORASI GAMBAR ROTI -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/Biskuit.png') }}"
            class="absolute -top-10 -left-16 w-[375px] rotate-[15deg] opacity-80 drop-shadow-2xl" alt="Pretzel">
        <img src="{{ asset('images/Croissant.png') }}"
            class="absolute -top-36 left-[35%] w-[400px] -rotate-12 opacity-80 drop-shadow-2xl" alt="Croissant">
        <img src="{{ asset('images/Biskuit.png') }}"
            class="absolute -top-10 -right-16 w-[375px] -rotate-45 opacity-80 drop-shadow-2xl" alt="Pretzel">
        <img src="{{ asset('images/Sourdough.png') }}"
            class="absolute top-[65%] left-[15%] w-[380px] -translate-y-1/2 opacity-80 drop-shadow-2xl" alt="Sourdough">
        <img src="{{ asset('images/Roti.png') }}"
            class="absolute top-[57%] left-[40%] w-[600px] -translate-y-1/2 opacity-80 drop-shadow-2xl" alt="Roti">
        <img src="{{ asset('images/Roti.png') }}"
            class="absolute top-[75%] -left-[20%] w-[600px] -translate-y-1/2 opacity-80 drop-shadow-2xl" alt="Roti">
        <img src="{{ asset('images/Biskuit.png') }}"
            class="absolute -bottom-48 left-[42%] w-[320px] -rotate-[20deg] opacity-80 drop-shadow-2xl" alt="Pretzel">
        <img src="{{ asset('images/Croissant.png') }}"
            class="absolute -bottom-40 -right-10 w-[450px] -rotate-90 opacity-80 drop-shadow-2xl" alt="Roti">
    </div>

    <!-- GRADASI COKELAT MUDA DARI BAWAH (z-10) -->
    <div
        class="absolute bottom-0 left-0 w-full h-[60%] bg-gradient-to-t from-[#E8A55B] via-[#E8A55B]/40 to-transparent z-10 pointer-events-none opacity-80">
    </div>

    <!-- TOMBOL BACK (z-50) -->
    <a href="{{ url('/') }}"
        class="absolute top-10 left-10 w-[60px] h-[60px] bg-[#8B3B08] rounded-full flex items-center justify-center text-white shadow-xl hover:scale-105 transition-transform z-50 cursor-pointer">
        <svg class="w-8 h-8 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </a>

    <!-- LOGO DINEARY (z-50) -->
    <div class="absolute bottom-10 left-10 z-50">
        <img src="{{ asset('images/dineary logo coklat.png') }}" alt="Dineary Logo" class="w-[280px] drop-shadow-lg">
    </div>

    <!-- KOTAK FORM GLASSMORPHISM (Mengambang di Kanan) -->
    <div class="absolute right-[5%] lg:right-[8%] top-1/2 -translate-y-1/2 w-full max-w-[600px] z-40">
        <div
            class="w-full bg-[#FDF4E3]/50 backdrop-blur-md border-[1.5px] border-white/60 rounded-[45px] px-14 py-12 shadow-[0_15px_40px_rgba(139,59,8,0.15)]">

            <div class="w-full flex flex-col items-center">
                <!-- Judul -->
                <h2 class="font-bagh font-black text-[60px] text-[#5A5D46] mb-10 drop-shadow-sm tracking-wide">Sign Up
                </h2>

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="w-full flex flex-col gap-4">
                    @csrf

                    <!-- Grid First Name & Last Name -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label class="font-stack text-[#713B17] font-semibold text-[14px] ml-2">First Name</label>
                            <input type="text" name="first_name"
                                class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] font-stack font-semibold outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all"
                                required autofocus>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="font-stack text-[#713B17] font-semibold text-[14px] ml-2">Last Name</label>
                            <input type="text" name="last_name"
                                class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] font-stack font-semibold outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all"
                                required>
                        </div>
                    </div>

                    <!-- Input Email -->
                    <div class="flex flex-col gap-1.5">
                        <label class="font-stack text-[#713B17] font-semibold text-[14px] ml-2">Email</label>
                        <input type="email" name="email"
                            class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] font-stack font-semibold outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all"
                            required>
                    </div>

                    <!-- Input Username -->
                    <div class="flex flex-col gap-1.5">
                        <label class="font-stack text-[#713B17] font-semibold text-[14px] ml-2">Username</label>
                        <input type="text" name="username"
                            class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] font-stack font-semibold outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all"
                            required>
                    </div>

                    <!-- Input Password -->
                    <div class="flex flex-col gap-1.5">
                        <label class="font-stack text-[#713B17] font-semibold text-[14px] ml-2">Password</label>
                        <input type="password" name="password"
                            class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] font-stack font-semibold outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all"
                            required>
                    </div>
                    <div class="flex flex-col gap-1.5 mt-4">
    <label class="text-[#713B17] font-semibold text-[14px] ml-2">Confirm Password</label>
    <input type="password" name="password_confirmation" 
           class="w-full bg-white/90 h-[54px] rounded-[18px] px-5 text-[#713B17] outline-none border border-transparent focus:border-white focus:ring-4 focus:ring-white/50 shadow-inner transition-all" 
           required>
</div>

                    <!-- Tombol Sign Up -->
                   <button type="submit" class="w-full bg-[#5A5D46] hover:bg-[#4A4D3A] text-white font-stack font-bold text-[18px] h-[60px] rounded-full mt-4 shadow-lg hover:scale-[1.02] transition-transform cursor-pointer flex items-center justify-center">
    Sign Up
</button>

                    <!-- Link Login -->
                    <p class="text-center font-stack text-[#713B17] text-[13px] mt-4 font-semibold">
                        Already have an account? <a href="{{ route('login') }}" class="font-black hover:underline cursor-pointer">Login</a>
                    </p>
                    

                </form>
            </div>
        </div>
    </div>

</body>

</html>