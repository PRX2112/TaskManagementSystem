<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ __('Create New Team') }}</h1>
                <p>{{ __('Build a team to collaborate on projects and achieve your goals together.') }}</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light">
                <i class="bi bi-arrow-left me-2"></i>
                {{ __('Back to Teams') }}
            </a>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <h5 class="card-title mb-0">{{ __('Team Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.store') }}">
                            @csrf

                            <!-- Team Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Team Name') }}</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Enter team name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-people me-2"></i>
                                    {{ __('Create Team') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>