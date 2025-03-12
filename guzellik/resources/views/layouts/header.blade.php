<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Güzellik Merkezi</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hizmet') }}">Hizmetler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ekip') }}">Ekibimiz</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointment.index') }}">Randevularım</a>
                    </li>
                @endauth
            </ul>
            <div class="d-flex align-items-center">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger me-2">
                            <i class="fas fa-sign-out-alt me-2"></i>Çıkış Yap
                        </button>
                    </form>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('appointment.index') }}">
                                    <i class="fas fa-calendar me-2"></i>Randevularım
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link btn-login me-2" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>Giriş Yap
                    </a>
                    <a class="nav-link btn-register" href="{{ route('register') }}">
                        <i class="fas fa-user-plus me-1"></i>Kayıt Ol
                    </a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<style>
.navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 15px 0;
}

.navbar-brand {
    color: #800000;
    font-weight: 600;
    font-size: 1.5rem;
}

.navbar-brand:hover {
    color: #600000;
}

.nav-link {
    color: #333;
    font-weight: 500;
    padding: 8px 15px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    color: #800000;
}

.btn-login {
    color: #800000;
    border: 2px solid #800000;
    border-radius: 25px;
    padding: 8px 20px;
    transition: all 0.3s ease;
}

.btn-login:hover {
    background: #800000;
    color: white;
    transform: translateY(-2px);
}

.btn-register {
    background: #800000;
    color: white;
    border-radius: 25px;
    padding: 8px 20px;
    transition: all 0.3s ease;
}

.btn-register:hover {
    background: #600000;
    color: white;
    transform: translateY(-2px);
}

.dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-radius: 10px;
    padding: 10px;
}

.dropdown-item {
    padding: 8px 20px;
    color: #333;
    font-weight: 500;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: #fff5f5;
    color: #800000;
}

@media (max-width: 991px) {
    .navbar-nav {
        text-align: center;
    }

    .navbar-collapse {
        background: rgba(255, 255, 255, 0.95);
        padding: 10px;
        border-radius: 10px;
    }

    .btn-login,
    .btn-register {
        width: 100%;
        text-align: center;
        margin: 5px 0;
    }

    .dropdown-menu {
        width: 100%;
        text-align: center;
    }
}
</style>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">