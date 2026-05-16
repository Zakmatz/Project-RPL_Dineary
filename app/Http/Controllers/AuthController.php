<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampil halaman login user
    public function showUserLogin()
    {
        return view('auth.login');
    }

    // Login user & admin (sistem yang menentukan role)
    public function userLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cek ke tabel admins dulu
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            $request->session()->put('role', 'admin');
            return redirect()->route('admin.cafes.index');
        }

        // Kalau bukan admin, cek ke tabel users
        if (Auth::guard('web')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            $request->session()->put('role', 'user');

            // --- UBAHAN DISINI: Arahkan ke dashboard user, BUKAN home ---
            return redirect()->intended(route('user.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout user
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Tampil halaman login admin
    public function showAdminLogin()
    {
        return view('admin.login');
    }

    // Login admin
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->put('role', 'admin');
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Logout admin
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
