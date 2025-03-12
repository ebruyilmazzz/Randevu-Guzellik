@extends('layouts.admin')

@section('title', 'Randevu Düzenle')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.appointments.index') }}">Randevular</a></li>
    <li class="breadcrumb-item active">Randevu Düzenle</li>
@endsection

@section('styles')
<style>
    .appointment-edit-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.15);
    }

    .btn-action {
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-action i {
        margin-right: 0.5rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="appointment-edit-card p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Email Adresi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $appointment->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="tarih">Randevu Tarihi ve Saati</label>
                            <input type="datetime-local" class="form-control @error('tarih') is-invalid @enderror" 
                                   id="tarih" name="tarih" 
                                   value="{{ old('tarih', $appointment->tarih->format('Y-m-d\TH:i')) }}" required>
                            @error('tarih')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="durum">Randevu Durumu</label>
                            <select class="form-select @error('durum') is-invalid @enderror" id="durum" name="durum" required>
                                <option value="Aktif" {{ $appointment->durum == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="İptal" {{ $appointment->durum == 'İptal' ? 'selected' : '' }}>İptal</option>
                                <option value="Tamamlandı" {{ $appointment->durum == 'Tamamlandı' ? 'selected' : '' }}>Tamamlandı</option>
                            </select>
                            @error('durum')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-action">
                            <i class="fas fa-arrow-left"></i> Geri Dön
                        </a>
                        <button type="submit" class="btn btn-primary btn-action">
                            <i class="fas fa-save"></i> Değişiklikleri Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
