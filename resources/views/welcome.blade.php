<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --bs-primary: #4f46e5;
            --bs-primary-rgb: 79, 70, 229;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-primary-hero {
            background: white;
            color: var(--bs-primary);
            border: 2px solid white;
        }

        .btn-primary-hero:hover {
            background: var(--bs-primary);
            color: white;
        }

        .btn-outline-hero {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-hero:hover {
            background: white;
            color: var(--bs-primary);
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--bs-primary) 0%, #6366f1 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.5rem;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--bs-primary) !important;
        }

        .nav-link {
            font-weight: 500;
            color: #374151 !important;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--bs-primary) !important;
        }

        .stats-section {
            background: #f8fafc;
            padding: 4rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--bs-primary);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6b7280;
            font-weight: 500;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--bs-primary) 0%, #6366f1 100%);
            color: white;
            padding: 5rem 0;
        }

        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0 2rem;
        }

        .footer-link {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-link:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-hexagon-fill me-2"></i>
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">{{ __('Features') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{ __('Contact') }}</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">{{ __('Log in') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary ms-2">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">{{ __('Build Amazing Projects Together') }}</h1>
                        <p class="hero-subtitle">
                            {{ __('Streamline your workflow, collaborate with your team, and deliver exceptional results with our powerful project management platform.') }}
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-hero btn-primary-hero">
                                    {{ __('Go to Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="btn-hero btn-primary-hero">
                                    {{ __('Get Started Free') }}
                                </a>
                                <a href="{{ route('login') }}" class="btn-hero btn-outline-hero">
                                    {{ __('Sign In') }}
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=600" 
                             alt="Team collaboration" 
                             class="img-fluid rounded-3 shadow-lg"
                             style="max-height: 500px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">{{ __('Active Users') }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">{{ __('Projects Completed') }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">{{ __('Uptime') }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">{{ __('Support') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">{{ __('Powerful Features') }}</h2>
                <p class="lead text-muted">{{ __('Everything you need to manage projects efficiently') }}</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-kanban"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Project Management') }}</h5>
                        <p class="text-muted">{{ __('Organize your projects with intuitive boards, lists, and cards. Track progress and manage deadlines effortlessly.') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Team Collaboration') }}</h5>
                        <p class="text-muted">{{ __('Work together seamlessly with real-time updates, comments, and file sharing. Keep everyone on the same page.') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Analytics & Reports') }}</h5>
                        <p class="text-muted">{{ __('Get insights into your team\'s productivity with detailed analytics and customizable reports.') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Time Tracking') }}</h5>
                        <p class="text-muted">{{ __('Track time spent on tasks and projects. Generate accurate timesheets and improve time management.') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Security & Privacy') }}</h5>
                        <p class="text-muted">{{ __('Your data is protected with enterprise-grade security. Control access with advanced permission settings.') }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ __('Mobile Ready') }}</h5>
                        <p class="text-muted">{{ __('Access your projects anywhere, anytime. Our responsive design works perfectly on all devices.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-3">{{ __('Ready to Get Started?') }}</h2>
            <p class="lead mb-4">{{ __('Join thousands of teams already using our platform to deliver amazing results.') }}</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">
                    {{ __('Start Your Free Trial') }}
                </a>
            @else
                <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg px-5 py-3">
                    {{ __('Go to Dashboard') }}
                </a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">{{ config('app.name', 'Laravel') }}</h5>
                    <p class="text-muted">{{ __('Empowering teams to build amazing projects together with our comprehensive project management platform.') }}</p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3">{{ __('Product') }}</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">{{ __('Features') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Pricing') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Security') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3">{{ __('Company') }}</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">{{ __('About') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Blog') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Careers') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3">{{ __('Support') }}</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">{{ __('Help Center') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Contact') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Status') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3">{{ __('Legal') }}</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">{{ __('Privacy') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Terms') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('Cookies') }}</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. {{ __('All rights reserved.') }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex justify-content-md-end gap-3">
                        <a href="#" class="footer-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="footer-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="footer-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>