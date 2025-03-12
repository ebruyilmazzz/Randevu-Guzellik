<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Kayıt formu gösterimi
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    // Kayıt işlemi
    public function register(Request $request)
    {
        // Veritabanına eklemeden önce doğrulama
        $this->validator($request->all())->validate();

        // Kullanıcıyı oluştur
        $user = $this->create($request->all());

        // Giriş yap ve yönlendirme
        auth()->login($user);

        return redirect()->route('home'); // Kayıt başarılı olduktan sonra yönlendirme
    }

    // Doğrulama işlemi
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Kullanıcı oluşturma
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
