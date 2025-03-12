@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('styles')
<style>
    .dashboard-stats {
        margin-top: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .stat-card i {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .stat-card h3 {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .stat-card p {
        color: #666;
        margin: 0;
        font-size: 1.1rem;
    }

    .recent-appointments {
        margin-top: 50px;
    }

    .table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .table thead th {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 15px;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
    }

    .status-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .status-aktif {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .status-iptal {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    .status-tamamlandi {
        background: rgba(0, 123, 255, 0.2);
        color: #007bff;
    }

    .btn-action {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        margin: 0 5px;
        transition: all 0.3s;
    }
</style>
@endsection

@section('content')

<div class="container">
    <h2>Admin Paneli</h2>
    <p>Hoş geldiniz, {{ Auth::user()->name }}!</p>
</div>
<div class="container-fluid">
    <div class="dashboard-stats">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card text-center">
                    <i class="fas fa-calendar"></i>
                    <h3>{{ $statistics['total_appointments'] }}</h3>
                    <p>Toplam Randevu</p>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card text-center">
                    <i class="fas fa-clock"></i>
                    <h3>{{ $statistics['today_appointments'] }}</h3>
                    <p>Bugünkü Randevular</p>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card text-center">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>{{ $statistics['active_appointments'] }}</h3>
                    <p>Aktif Randevular</p>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card text-center">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>{{ $statistics['upcoming_appointments'] }}</h3>
                    <p>Gelecek Randevular</p>
                </div>
            </div>
        </div>
    </div>

    <div class="recent-appointments">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Son Randevular</h2>
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary">
                <i class="fas fa-list"></i> Tüm Randevuları Görüntüle
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>Müşteri</th>
                        <th>Email</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latest_appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->tarih->format('d.m.Y H:i') }}</td>
                        <td>{{ $appointment->user->name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($appointment->durum) }}">
                                {{ $appointment->durum }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-sm btn-primary btn-action">
                                <i class="fas fa-edit"></i> Düzenle
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
