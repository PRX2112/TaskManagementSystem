<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $team->name }}</h1>
                <p>{{ __('Manage team members, projects, and collaboration.') }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left me-2"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container py-4">
        <!-- Team Overview -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card h-70">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ __('Team Overview') }}</h5>
                            {{-- <span class="badge bg-success">{{ __('Active') }}</span> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4">
                            {{ __('A dedicated team focused on developing innovative web applications and maintaining high-quality code standards. We work collaboratively to deliver exceptional user experiences.') }}
                        </p>

                        <!-- Team Stats -->
                        <div class="row g-3 mb-4">
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <div class="display-6 text-primary mb-1">{{ count($teamMembers) }}</div>
                                    <small class="text-muted">{{ __('Members') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <div class="display-6 text-success mb-1">{{ count($projects) }}</div>
                                    <small class="text-muted">{{ __('Projects') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <div class="display-6 text-warning mb-1">{{ $totalTasks }}</div>
                                    <small class="text-muted">{{ __('Tasks') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <h5 class="card-title mb-0">{{ __('Quick Actions') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                                <i class="bi bi-folder-plus me-2"></i>
                                {{ __('New Project') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members and Projects -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-header bg-transparent border-0 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">{{ __('Team Members') }}</h5>
                        <span class="badge bg-light text-dark">{{ count($teamMembers) }} {{ __('members') }}</span>
                    </div>
                </div>
                @foreach ($teamMembers as $member)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; font-weight: 600;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">{{ $member->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- {{ $teamMembers->links() }} --}}
            </div>

            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">{{ __('Active Projects') }}</h5>
                </div>
                @foreach ($projects as $project)    
                <a href="{{ route('projects.show', ['project'=> $project->id]) }}">                
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">{{ $project->name }}</h6>
                                    </div>
                                </div>
                                <small class="text-muted"><i class="bi bi-box-arrow-up-right"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
                {{-- {{ $projects->links() }} --}}
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Project') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addProjectForm" action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="team_id" name="team_id" value="{{ $team->id }}" placeholder="{{ __('Enter project name') }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter project name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="{{ __('Enter Description') }}"></textarea>
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
</x-app-layout>