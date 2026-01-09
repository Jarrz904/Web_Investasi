<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     * Middleware 'guest' memastikan user yang sudah login tidak bisa ke sini.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('auth.login');
    }

    /**
     * Logika Autentikasi.
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // 2. Percobaan Login
        // $request->remember akan bernilai true jika checkbox 'Ingat Saya' dicentang
        if (Auth::attempt($credentials, $request->has('remember'))) {
            
            // Regenerasi session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            // 3. Redirect ke Dashboard Admin
            // intended() akan mengirim user ke halaman yang mereka coba akses sebelumnya, 
            // atau default ke route admin.dashboard
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang di Panel Admin Portal Investasi!');
        }

        // 4. Jika Gagal Login
        return back()->withErrors([
            'email' => 'Kredensial yang Anda berikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    /**
     * Logika Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus data session agar aman
        $request->session()->invalidate();

        // Membuat ulang token CSRF
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}