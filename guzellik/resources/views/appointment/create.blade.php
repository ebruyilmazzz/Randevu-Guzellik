@extends('layouts.app')

@section('content')
<div class="appointments-section">
    <div class="container">
        <h1 class="page-title">Yeni Randevu Oluştur</h1>

        <div class="appointments-card">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('appointment.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="tarih">Randevu Tarihi ve Saati</label>
                    <input type="datetime-local" 
                           class="form-control @error('tarih') is-invalid @enderror" 
                           id="tarih" 
                           name="tarih" 
                           required>
                    @error('tarih')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-new-appointment">
                        <i class="fas fa-calendar-plus me-2"></i>Randevu Oluştur
                    </button>
                    <a href="{{ route('appointment.index') }}" class="btn btn-outline-secondary ms-3">
                        <i class="fas fa-arrow-left me-2"></i>Geri Dön
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.appointments-section {
    padding: 80px 0;
    background: linear-gradient(to right, #f8f9fa, #ffffff);
}

.appointments-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.page-title {
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 30px;
    text-align: center;
    font-weight: 600;
}

.form-group label {
    color: #555;
    font-weight: 500;
    margin-bottom: 8px;
}

.form-control {
    border-radius: 8px;
    padding: 12px;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #800000;
    box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
}

.btn-new-appointment {
    background-color: #800000;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    border: none;
}

.btn-new-appointment:hover {
    background-color: #600000;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(128, 0, 0, 0.3);
}

.btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
}

.alert {
    border-radius: 8px;
    padding: 15px 20px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .appointments-card {
        padding: 20px;
    }

    .btn-new-appointment,
    .btn-outline-secondary {
        width: 100%;
        margin: 5px 0;
    }
}
</style>
@endsection
