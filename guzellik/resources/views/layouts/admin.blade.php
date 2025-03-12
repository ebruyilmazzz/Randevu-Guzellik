<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Güzellik Merkezi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #800000;
            --secondary-color: #4a0000;
        }

        .admin-sidebar {
            background: var(--primary-color);
            min-height: 100vh;
            padding-top: 20px;
        }

        .admin-sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 15px 20px;
            margin: 5px 0;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .admin-sidebar .nav-link i {
            width: 25px;
        }

        .admin-content {
            padding: 20px;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .top-bar {
            background: white;
            padding: 15px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .breadcrumb {
            margin: 0;
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-dropdown .dropdown-menu {
            right: 0;
            left: auto;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                min-height: auto;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 admin-sidebar">
                <div class="text-center mb-4">
                    <h4 class="text-white">Admin Panel</h4>
                </div>
                <nav class="nav flex-column">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check"></i> Randevular
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i> Müşteriler
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i> Ayarlar
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 admin-content">
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                    <div class="user-dropdown dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

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

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
