<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Proses Validasi Input dari Form HTML
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Menggabungkan First Name & Last Name menjadi Full Name
        $fullName = $request->first_name . ' ' . $request->last_name;

        // 3. Blok Try-Catch untuk Mendeteksi Error Database
        try {
            
            $user = User::create([
                'name' => $fullName, 
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        } catch (\Exception $e) {
            // JIKA DATABASE ERROR, KODE DI BAWAH INI AKAN MENAMPILKAN PESAN ERRORNYA SECARA DETAIL
            dd([
                'Pesan Error' => $e->getMessage(),
                'File Tempat Error' => $e->getFile(),
                'Baris Error' => $e->getLine()
            ]);
        }

        // 4. Jika proses insert database sukses, lanjutkan alur login otomatis
        event(new Registered($user));

        Auth::login($user);

        $request->session()->put('role', 'user');

        return redirect(route('home', absolute: false));
    }
}