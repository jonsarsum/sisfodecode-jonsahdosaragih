<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Informasi Mahasiswa')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #7C3AED;
            --success-color: #10B981;
            --danger-color: #EF4444;
            --warning-color: #F59E0B;
            --info-color: #3B82F6;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F9FAFB;
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            backdrop-filter: blur(10px);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: white !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(255,255,255,0.5);
        }
        
        .navbar-brand i {
            font-size: 1.8rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0 5px;
            border-radius: 8px;
            padding: 10px 18px !important;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.1);
            transition: left 0.3s ease;
        }
        
        .nav-link:hover::before {
            left: 0;
        }
        
        .nav-link:hover {
            background-color: rgba(255,255,255,0.15);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .nav-link.active {
            background-color: rgba(255,255,255,0.25);
            color: white !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        
        .nav-link i {
            transition: transform 0.3s ease;
        }
        
        .nav-link:hover i {
            transform: scale(1.2) rotate(5deg);
        }
        
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            margin-top: 10px;
            animation: dropdownFade 0.3s ease;
        }
        
        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dropdown-item {
            padding: 10px 20px;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 2px 8px;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            transform: translateX(5px);
        }
        
        .dropdown-divider {
            margin: 8px 0;
        }
        
        .content-wrapper {
            padding: 30px 0;
            min-height: calc(100vh - 160px);
        }
        
        .page-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--primary-color);
        }
        
        .page-header h1 {
            color: #1F2937;
            font-weight: 700;
            font-size: 2rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            font-weight: 500;
            padding: 10px 24px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .card-header {
            background-color: #F3F4F6;
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
            border-radius: 12px 12px 0 0 !important;
        }
        
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: #F3F4F6;
            transform: scale(1.01);
        }
        
        .footer {
            background-color: #1F2937;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
        
        .badge {
            padding: 6px 12px;
            font-weight: 500;
        }
        
        /* Animation for alerts */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert {
            animation: slideDown 0.3s ease;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill me-2"></i>
                Sisfo Decode
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- Menu untuk semua user --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            <i class="bi bi-house-fill me-1"></i> Home
                        </a>
                    </li>
                    
                    {{-- Menu hanya untuk user yang sudah login --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('study-programs*') ? 'active' : '' }}" href="{{ url('/study-programs') }}">
                                <i class="bi bi-book-fill me-1"></i> Program Studi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">
                                <i class="bi bi-people-fill me-1"></i> Mahasiswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('subjects*') ? 'active' : '' }}" href="{{ url('/subjects') }}">
                                <i class="bi bi-journal-text me-1"></i> Mata Kuliah
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                    
                    {{-- Menu hanya untuk user yang belum login (guest) --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i> Register
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <!-- Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <p class="mb-0">
                Sisfo Decode 2026
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper) -->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Delete Confirmation Script -->
    <script>
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        function confirmDelete(formId) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.')) {
                document.getElementById(formId).submit();
            }
            return false;
        }
    </script>
    
    @yield('scripts')
</body>
</html>
