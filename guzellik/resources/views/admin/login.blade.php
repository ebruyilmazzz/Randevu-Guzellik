@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-card">
                <h2>Admin Girişi</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Şifre</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 w-100">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 120px !important;
    }

    .login-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .login-card h2 {
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
</style>
@endsection
