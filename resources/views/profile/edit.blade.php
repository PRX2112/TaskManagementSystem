<x-app-layout>
    <x-slot name="header">
        <h1>{{ __('Profile') }}</h1>
        <p>{{ __('Manage your account settings and profile information.') }}</p>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row g-4">
                    <!-- Profile Information -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-transparent border-0 pt-4">
                                <h5 class="card-title mb-0">{{ __('Profile Information') }}</h5>
                            </div>
                            <div class="card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-transparent border-0 pt-4">
                                <h5 class="card-title mb-0">{{ __('Update Password') }}</h5>
                            </div>
                            <div class="card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>

                    <!-- Delete Account -->
                    <div class="col-12">
                        <div class="card border-danger">
                            <div class="card-header bg-transparent border-0 pt-4">
                                <h5 class="card-title mb-0 text-danger">{{ __('Delete Account') }}</h5>
                            </div>
                            <div class="card-body">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>