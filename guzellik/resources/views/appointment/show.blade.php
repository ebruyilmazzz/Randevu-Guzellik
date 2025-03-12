@extends('layouts.app')

@section('content')
<div class="appointments-section">
    <div class="container">
        <h1 class="page-title">Randevu Detayı</h1>

        <div class="appointments-card">
            <div class="appointment-details">
                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fas fa-calendar me-2"></i>Tarih
                    </span>
                    <span class="detail-value">{{ $randevu->tarih->format('d.m.Y') }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fas fa-clock me-2"></i>Saat
                    </span>
                    <span class="detail-value">{{ $randevu->tarih->format('H:i') }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fas fa-envelope me-2"></i>Email
                    </span>
                    <span class="detail-value">{{ $randevu->email }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fas fa-info-circle me-2"></i>Durum
                    </span>
                    <span class="status-badge {{ $randevu->durum == 'Aktif' ? 'status-active' : 'status-cancelled' }}">
                        {{ $randevu->durum }}
                    </span>
                </div>
            </div>

            <div class="appointment-actions mt-5 text-center">
            @if($randevu->durum == 'Aktif' && strtotime($randevu->tarih) >= time())
    <form action="{{ route('appointment.destroy', $randevu->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bu randevuyu iptal etmek istediğinizden emin misiniz?')">
            <i class="fas fa-times-circle me-2"></i>Randevuyu İptal Et
        </button>
    </form>
@elseif(strtotime($randevu->tarih) < time())
    <span class="status-badge status-cancelled">
        Randevu Geçmiş
    </span>
@endif
                <a href="{{ route('appointment.index') }}" class="btn btn-outline-secondary ms-3">
                    <i class="fas fa-arrow-left me-2"></i>Geri Dön
                </a>
            </div>
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

.appointment-details {
    max-width: 600px;
    margin: 0 auto;
}

.detail-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-label {
    color: #666;
    font-weight: 500;
    font-size: 1.1rem;
}

.detail-value {
    color: #333;
    font-weight: 600;
    font-size: 1.1rem;
}

.status-badge {
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
}

.status-active {
    background-color: #28a745;
    color: white;
}

.status-cancelled {
    background-color: #dc3545;
    color: white;
}

.btn {
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
}

.btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(108, 117, 125, 0.3);
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .appointments-card {
        padding: 20px;
    }

    .detail-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }

    .btn {
        width: 100%;
        margin: 5px 0;
    }
}
</style>
@endsection
