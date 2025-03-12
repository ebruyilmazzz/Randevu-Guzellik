@extends('layouts.app')

@section('content')
<div class="services-section">
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1 class="page-title">Hizmetlerimiz</h1>
            <p class="section-description">Size özel profesyonel güzellik ve bakım hizmetlerimiz</p>
        </div>

        <div class="row gy-4"> <!-- Burada gy-4 ile dikey boşluğu artırdık -->
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3>Saç Kesimi</h3>
                    <p>Profesyonel ekibimiz ile yüz şeklinize ve tarzınıza uygun modern saç kesimi.</p>
                    <a href="{{ route('appointment.create') }}" class="btn-service">Randevu Al</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Saç Boyama</h3>
                    <p>Kaliteli ürünler ve uzman kadromuz ile istediğiniz renge kavuşun.</p>
                    <a href="{{ route('appointment.create') }}" class="btn-service">Randevu Al</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Makyaj</h3>
                    <p>Özel günleriniz için profesyonel makyaj hizmeti.</p>
                    <a href="{{ route('appointment.create') }}" class="btn-service">Randevu Al</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3>Cilt Bakımı</h3>
                    <p>Cildinizi yenileyen ve canlandıran özel bakım uygulamaları.</p>
                    <a href="{{ route('appointment.create') }}" class="btn-service">Randevu Al</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
.services-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #fff5f5 0%, #fff 100%);
    min-height: calc(100vh - 200px);
}

.page-title {
    color: #800000;
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.section-description {
    color: #666;
    font-size: 1.2rem;
    margin-bottom: 3rem;
}

.service-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 20px; /* Ekstra boşluk eklendi */
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(128,0,0,0.15);
}

.service-icon {
    width: 80px;
    height: 80px;
    background: #fff5f5;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.service-icon i {
    color: #800000;
    font-size: 2rem;
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    background: #800000;
}

.service-card:hover .service-icon i {
    color: white;
    transform: rotateY(180deg);
}

.service-card h3 {
    color: #800000;
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
}

.service-card p {
    color: #666;
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
    flex-grow: 1;
}

.btn-service {
    display: inline-block;
    padding: 0.75rem 2rem;
    background: #800000;
    color: white;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid #800000;
    width: auto;
    margin-top: 1rem;
}

.btn-service:hover {
    background: transparent;
    color: #800000;
    transform: translateY(-2px);
    text-decoration: none;
}

@media (max-width: 768px) {
    .services-section {
        padding: 40px 0;
    }

    .page-title {
        font-size: 2rem;
    }

    .section-description {
        font-size: 1rem;
    }

    .service-card {
        padding: 1.5rem;
    }
}
</style>
@endsection
