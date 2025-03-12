@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-card">
                <h2>Kayıt Ol</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Ad Soyad</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">E-posta</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="phone">Telefon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password_confirmation">Şifre Tekrar</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 w-100">Kayıt Ol</button>

                    <div class="text-center mt-3">
                        <p>Zaten hesabınız var mı? <a href="{{ route('login') }}" class="login-link">Giriş Yap</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 120px !important;
    }

    .register-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .register-card h2 {
        color: #800000;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #800000;
        box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
    }

    .btn-primary {
        background: #800000;
        border: none;
        padding: 12px;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #600000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.2);
    }

    label {
        color: #555;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .login-link {
        color: #800000;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .login-link:hover {
        color: #600000;
        text-decoration: underline;
    }
</style>
@endsection
