<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serenity Beauty - Güzellik Salonu</title>
    
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        :root {
            --primary-color: #800000;
            --secondary-color: #333333;
            --accent-color: #17a2b8;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --primary-dark: #600000;
            --primary-light: rgba(128, 0, 0, 0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--secondary-color);
            line-height: 1.6;
        }

        /* Header Styles */
        .main-header {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .main-nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 30px;
        }

        .main-nav a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .main-nav a:hover {
            color: var(--primary-color);
            background-color: rgba(128, 0, 0, 0.1);
        }

        .main-nav .active {
            color: var(--primary-color);
            background-color: rgba(128, 0, 0, 0.1);
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }

        .btn-logout-nav {
            background: #dc3545 !important;
            color: white !important;
            padding: 8px 20px !important;
            border-radius: 20px !important;
            border: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            text-decoration: none !important;
            cursor: pointer !important;
        }

        .btn-logout-nav:hover {
            background: #c82333 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2) !important;
        }

        .admin-badge {
            background: var(--primary-color);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-left: 10px;
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            min-height: calc(100vh - 180px);
            padding: 40px 0;
        }

        /* Footer Styles */
        .main-footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 0 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
        }

        .footer-section h3 {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary-color);
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
                padding: 15px;
            }

            .main-nav ul {
                flex-direction: column;
                gap: 15px;
                margin-top: 15px;
            }

            .footer-section {
                flex: 100%;
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }
        }
    </style>

    @yield('styles')
</head>
<body>
    @include('layouts.header')

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>İletişim</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Adres: Örnek Mahallesi, Güzel Sokak No:123</p>
                    <p><i class="fas fa-phone"></i> Telefon: (555) 123-4567</p>
                    <p><i class="fas fa-envelope"></i> Email: info@serenitybeauty.com</p>
                </div>
                <div class="footer-section">
                    <h3>Hızlı Linkler</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
                        <li><a href="{{ url('/hizmetler') }}">Hizmetler</a></li>
                        <li><a href="{{ url('/ekip') }}">Ekip</a></li>
                        <li><a href="{{ url('appointment.index') }}">Randevularım</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Bizi Takip Edin</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Serenity Beauty. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
    @yield('scripts')
</body>
</html>