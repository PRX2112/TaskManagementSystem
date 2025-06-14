<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ $project->name ?? 'Project Details' }}</h1>
                <p>{{ __('Manage and track your project progress.') }}</p>
            </div>
            <div class="d-flex gap-2">
                {{-- <a href="{{ route('projects.edit', $project ?? 1) }}" class="btn btn-outline-light">
                    <i class="bi bi-pencil me-2"></i>
                    {{ __('Edit') }}
                </a> --}}
                <a href="{{ route('teams.show', ['team'=>$project->team->id]) }}" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left me-2"></i>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container py-4">
        <!-- Project Overview -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card h-70">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ __('Project Overview') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4">
                            {{ $project->description ?? 'This project is focused on developing a comprehensive web application to streamline business processes and enhance user experience.' }}
                        </p>

                        <!-- Project Stats -->
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">{{ __('Start Date') }}</small>
                                        <span class="fw-medium">{{ $project->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-check text-success me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">{{ __('Due Date') }}</small>
                                        <span class="fw-medium">{{ __('-') }}</span>
                                    </div>
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
                            <a href="{{ route('tasks.create',['project_id'=>$project->id]) }}" class="btn btn-primary">
                                <i class="bi bi-plus-square me-2"></i>
                                {{ __('Add Task') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks and Timeline -->
        <div class="card-header bg-transparent border-0  mt-3 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ __('Recent Tasks') }}</h5>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($tasks as $task)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center w-100">
                                    <!-- Column 1: Task Title and Assignee -->
                                    <div class="col-md-5">
                                        <h6 class="mb-1 {{ ($task->status == 'done') ? 'text-decoration-line-through' : '' }} text-muted">
                                            {{ $task->title }}
                                        </h6>
                                        <small class="text-muted">@if($task->assignee)Assigned to <b>{{ $task->assignee->name }}@else Not Assigned @endif</b></small>
                                    </div>

                                    <!-- Column 2: Assignment Action -->
                                    <div class="col-md-4">
                                        @if(auth()->user()->hasRole('admin') && ($task->status == 'pending' || $task->status == 'in_progress'))
                                            <form action="{{ route('tasks.assign', $task->id) }}" method="POST" class="d-flex">
                                                @csrf
                                                <select name="assignee_id" class="form-select form-select-sm me-2" required>
                                                    <option value="">Assign to...</option>
                                                    @foreach($teamMembers as $member)
                                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Assign</button>
                                            </form>
                                        @endif
                                    </div>

                                    <!-- Column 3: Task Status -->
                                    <div class="col-md-3 text-md-end mt-2 mt-md-0">
                                        @if ($task->status == 'done')
                                            <span class="badge bg-success">{{ __('Done') }}</span>
                                        @elseif ($task->status == 'in_progress')
                                            <span class="badge bg-warning">{{ __('In Progress') }}</span>
                                        @else
                                            <span class="badge bg-light text-dark">{{ __('Pending') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            @endforeach
        </div>
    </div>
</x-app-layout>
