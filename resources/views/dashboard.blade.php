<x-app-layout>
    <x-slot name="header">
        <h1>{{ __('Dashboard') }}</h1>
        <p>{{ __('Welcome back! Here\'s what\'s happening with your projects.') }}</p>
    </x-slot>
    <div class="container py-4">
        @role('admin')
        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="display-4 text-info mb-4">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">{{ __('Team Members') }}</h5>
                        <h2 class="text-info mb-0">{{ $totalMembers }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="display-4 text-primary mb-4">
                            <i class="bi bi-folder"></i>
                        </div>
                        <h5 class="card-title">{{ __('Total Projects') }}</h5>
                        <h2 class="text-primary mb-0">{{ $totalProjects }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="display-4 text-success mb-4">
                            <i class="bi bi-list-task"></i>
                        </div>
                        <h5 class="card-title">{{ __('Total Tasks') }}</h5>
                        <h2 class="text-success mb-0">{{ $totalTasks }}</h2>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        <div class="row g-4">
            <!-- Recent Projects -->
            <div class="col-lg-8">
                @foreach ($teams as $team)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('teams.show',['team'=>$team->id]) }}" style="hover: background-color: #f8f9fa;">
                            <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">{{ $team->name }}</h6>
                                        @foreach ($team->users as $members)
                                            <small class="badge text-muted">{{ $members->name }}</small>
                                        @endforeach
                                    </div>
                                </div>
                                <span class="link"><i class="bi bi-box-arrow-up-right"></i></span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card h-75">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <h5 class="card-title mb-0">{{ __('Quick Actions') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            @role('admin')
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignMemberModal">
                                <i class="bi bi-person me-2"></i>
                                {{ __('Add Member to Team') }}
                            </button>
                            @endrole
                            <a href="{{ route('teams.create') }}" class="btn btn-primary">
                                <i class="bi bi-people me-2"></i>
                                {{ __('Add Team') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @role('admin')
           <!-- Add Member to team Modal -->
            <div class="modal fade" id="assignMemberModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Assign Member to Team') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="assignMemberForm" action="{{ route('teams.assign') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3 mb-6">
                                <div class="col-md-12">
                                    <label for="team_id" class="form-label">{{ __('Teams') }}</label>
                                    <select id="team_id" class="form-select" name="team_id" required>
                                        <option value="">{{ __('Select Team') }}</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
                                </div>
                                <div class="col-md-12">
                                    <label for="user_id" class="form-label">{{ __('Members') }}</label>
                                    <select id="user_id" class="form-select" name="user_id" required>
                                        <option value="">{{ __('Select Member') }}</option>
                                        @foreach ($allUsers as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
</x-app-layout>