<x-guest-layout>
    <div class="auth-header">
        <div class="logo">
            <i class="bi bi-hexagon-fill"></i>
        </div>
        <h1>{{ __('Welcome Back') }}</h1>
        <p>{{ __('Sign in to your account') }}</p>
    </div>

    <div class="auth-body mx-auto">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>

            <div class="text-center">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            @if (Route::has('register'))
                <div class="divider">
                    <span>{{ __('or') }}</span>
                </div>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                        {{ __('Create new account') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>