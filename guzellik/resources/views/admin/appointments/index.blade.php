@extends('layouts.admin')

@section('title', 'Randevular')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Randevular</li>
@endsection

@section('styles')
<style>
    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.9rem;
        margin: 0 3px;
        transition: all 0.3s;
    }

    .pagination {
        margin-top: 30px;
        justify-content: center;
    }

    .page-link {
        color: var(--primary-color);
        border: none;
        padding: 10px 15px;
        margin: 0 5px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .page-link:hover {
        background: rgba(128, 0, 0, 0.1);
        color: var(--primary-color);
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        color: white;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Randevular</h1>
        <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Randevu
        </a>
    </div>

    <div class="filter-section">
        <form action="{{ route('admin.appointments.index') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Durum</label>
                <select name="durum" class="form-select">
                    <option value="">Tümü</option>
                    <option value="Aktif" {{ request('durum') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="İptal" {{ request('durum') == 'İptal' ? 'selected' : '' }}>İptal</option>
                    <option value="Tamamlandı" {{ request('durum') == 'Tamamlandı' ? 'selected' : '' }}>Tamamlandı</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tarih Aralığı</label>
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Arama</label>
                <input type="text" name="search" class="form-control" placeholder="Email veya isim ile ara..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Filtrele
                </button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            @if($appointments->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0">
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
                            @foreach($appointments as $appointment)
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
                                        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Bu randevuyu silmek istediğinizden emin misiniz?')">
                                                <i class="fas fa-trash"></i> Sil
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $appointments->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <h3 class="h4 text-muted">Henüz randevu bulunmamaktadır</h3>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
