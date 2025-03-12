<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    // Giriş Sayfasını Göster
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Kullanıcı Girişi
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Direkt olarak randevu sayfasına yönlendir
            return redirect('/appointment')->with('success', 'Başarıyla giriş yaptınız!');
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->onlyInput('email');
    }

    // Kayıt Sayfasını Göster
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Yeni Kullanıcı Kaydı
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Kullanıcıyı oluştur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Kullanıcıyı giriş yaptır
        Auth::login($user);

        // Yönlendirme işlemi
        return redirect()->route('appointment.index')->with('success', 'Başarıyla kayıt oldunuz!');
    }

    // Kullanıcı Çıkışı
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Başarıyla çıkış yaptınız.');
    }
}