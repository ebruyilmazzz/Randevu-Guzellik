@extends('layouts.app')

@section('content')
@guest
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="alert-card">
                <h2>Giriş Yapmanız Gerekiyor</h2>
                <p>Randevu alabilmek için lütfen giriş yapın veya kayıt olun.</p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary me-3">Giriş Yap</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Kayıt Ol</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="appointments-section">
        <div class="container">
            <h1 class="page-title">Randevularım</h1>
            
            <div class="text-center">
                <a href="{{ route('appointment.create') }}" class="btn btn-new-appointment">
                    <i class="fas fa-plus-circle me-2"></i>Yeni Randevu Al
                </a>
            </div>

            <div class="appointments-card">
                @if(count($randevular) > 0)
                    <div class="table-responsive">
                        <table class="appointments-table">
                            <thead>
                                <tr>
                                    <th>Tarih</th>
                                    <th>Email</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($randevular as $randevu)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($randevu->tarih)->format('d.m.Y H:i') }}</td>
                                        <td>{{ $randevu->email }}</td>
                                        <td>
                                            <span class="status-badge {{ $randevu->durum == 'Aktif' ? 'status-active' : 'status-cancelled' }}">
                                                {{ $randevu->durum }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('appointment.show', $randevu->id) }}" 
                                               class="btn btn-action btn-edit">
                                                <i class="fas fa-eye me-1"></i>Detay
                                            </a>
                                            @if($randevu->durum == 'Aktif')
                                                <form action="{{ route('appointment.destroy', $randevu->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-action btn-delete"
                                                            onclick="return confirm('Bu randevuyu iptal etmek istediğinizden emin misiniz?')">
                                                        <i class="fas fa-trash-alt me-1"></i>İptal Et
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <p>Henüz randevunuz bulunmamaktadır.</p>
                        <p>Yeni bir randevu almak için yukarıdaki butonu kullanabilirsiniz.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endguest

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

.appointments-table {
    width: 100%;
    margin-top: 20px;
}

.appointments-table th {
    background-color: #800000;
    color: white;
    padding: 15px;
    font-weight: 500;
}

.appointments-table td {
    padding: 15px;
    vertical-align: middle;
}

.appointments-table tr {
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
}

.appointments-table tr:hover {
    background-color: #f8f9fa;
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
    margin-bottom: 30px;
}

.btn-new-appointment:hover {
    background-color: #600000;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(128, 0, 0, 0.3);
}

.btn-action {
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.btn-edit {
    background-color: #17a2b8;
    color: white;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
}

.empty-state i {
    font-size: 3rem;
    color: #800000;
    margin-bottom: 20px;
}

.empty-state p {
    color: #6c757d;
    font-size: 1.1rem;
}

.alert-card {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    text-align: center;
    margin-top: 50px;
}

.alert-card h2 {
    color: #800000;
    margin-bottom: 20px;
}

.alert-card p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-primary {
    background: #800000;
    border: none;
}

.btn-outline-primary {
    color: #800000;
    border-color: #800000;
}

.btn-outline-primary:hover {
    background: #800000;
    border-color: #800000;
}
</style>
@endsection
