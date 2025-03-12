@extends('layouts.app')

@section('styles')
<style>
  .hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('../image/anasayfa.jpg')}}');
    background-size: cover;
    background-position: center;
    height: 80vh;
    display: flex;
    align-items: center;
    color: white;
    margin-top: -80px;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    padding: 20px;
}

.hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.btn-primary {
    background-color: var(--primary-color);
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-primary:hover {
    background-color: #800000;
    transform: translateY(-2px);
}

.services {
    padding: 80px 0;
    background: white;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
}

.section-title h2 {
    color: var(--primary-color);
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.service-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: all 0.3s;
}

.service-card:hover {
    transform: translateY(-10px);
}

.service-icon {
    font-size: 2.5rem;
    color: #800000;
    margin-bottom: 20px;
}

.campaigns {
    padding: 80px 0;
    background: #f8f9fa;
}

.campaign-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    margin: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.campaign-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.campaign-content {
    padding: 20px;
}

.campaign-content h3 {
    color: #800000;
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }
    .hero p {
        font-size: 1rem;
    }
}

</style>
@endsection

@section('content')

<section class="hero">
    <div class="hero-content">
        <h1>Güzelliğinizi Keşfedin</h1>
        <p>Profesyonel ekibimiz ve modern salonumuzla size özel hizmetler sunuyoruz</p>
        <a href="{{ route('appointment.create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-calendar-plus"></i> Hemen Randevu Al
        </a>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="section-title">
            <h2>Hizmetlerimiz</h2>
            <p>Size özel profesyonel güzellik ve bakım hizmetleri</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3>Saç Kesimi</h3>
                    <p>Modern ve size özel saç kesim hizmetleri</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3>Cilt Bakımı</h3>
                    <p>Cildinizi canlandıran profesyonel bakım</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>Makyaj</h3>
                    <p>Özel günleriniz için profesyonel makyaj</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="campaigns">
    <div class="container">
        <div class="section-title">
            <h2>Kampanyalar</h2>
            <p>Kaçırılmayacak fırsatlar</p>
        </div>

        <div class="row">
            @php
                use Illuminate\Support\Facades\DB;
                $kampanyalar = DB::table('kampanyalar')->get();
            @endphp

            @if($kampanyalar->count() > 0)
                @foreach($kampanyalar as $kampanya)
                    <div class="col-md-4">
                        <div class="campaign-card">
                            <div class="campaign-image">
                                <img src="{{ asset($kampanya->resim) }}" alt="{{ $kampanya->baslik }}">
                            </div>
                            <div class="campaign-content">
                                <h3>{{ $kampanya->baslik }}</h3>
                                <p>{{ $kampanya->aciklama }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="campaign-card">
                        <div class="campaign-content">
                            <h3>Yakında</h3>
                            <p>Yeni kampanyalarımız çok yakında sizlerle!</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>



<script src="{{ asset('js/script.js') }}"></script>
@endsection
