<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="bi bi-hexagon-fill me-2"></i>
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Mobile menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Navigation Links -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door me-1"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                        <i class="bi bi-folder me-1"></i>
                        {{ __('Projects') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                        <i class="bi bi-check-square me-1"></i>
                        {{ __('Tasks') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('teams.*') ? 'active' : '' }}" href="{{ route('teams.index') }}">
                        <i class="bi bi-people me-1"></i>
                        {{ __('Teams') }}
                    </a>
                </li> --}}
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-light text-dark d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 0.875rem; font-weight: 600;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile Navigation Menu -->
<div class="d-lg-none">
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="container py-3">
            <div class="row">
                <div class="col-12">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="bi bi-house-door me-2"></i>
                            {{ __('Dashboard') }}
                        </a>
                        {{-- <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                            <i class="bi bi-folder me-2"></i>
                            {{ __('Projects') }}
                        </a>
                        <a href="{{ route('tasks.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                            <i class="bi bi-check-square me-2"></i>
                            {{ __('Tasks') }}
                        </a>
                        <a href="{{ route('teams.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('teams.*') ? 'active' : '' }}">
                            <i class="bi bi-people me-2"></i>
                            {{ __('Teams') }}
                        </a>
                        <hr>
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i>
                            {{ __('Profile') }}
                        </a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="list-group-item list-group-item-action text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>