<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>{{ __('Create New Task') }}</h1>
                <p>{{ __('Add a new task to keep your project organized and on track.') }}</p>
            </div>
            <a href="{{ route('projects.show',['project'=>$project->id]) }}" class="btn btn-outline-light">
                <i class="bi bi-arrow-left me-2"></i>
                {{ __('Back to Tasks') }}
            </a>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-transparent border-0 pt-4">
                        <h5 class="card-title mb-0">{{ __('Task Details') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <input id="project_id" class="form-control" type="hidden" name="project_id" value="{{ $project->id }}" required>
                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label">{{ __('Task Title') }}</label>
                                <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" required autofocus placeholder="{{ __('Enter task title') }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description" rows="4" placeholder="{{ __('Describe the task in detail...') }}">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>


                            @role('admin')
                            <!-- Status and Assignee Row -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="assigned_to" class="form-label">{{ __('Assign To') }}</label>
                                    <select id="assigned_to" class="form-select" name="assigned_to">
                                        <option value="">{{ __('Select team member') }}</option>
                                        @foreach ($teamMembers as $members)
                                            <option value="{{ $members->id }}" {{ old('assigned_to') == $members->id ? 'selected' : '' }}>
                                                {{ $members->name }}
                                            </option>
                                            
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('assigned_to')" class="mt-2" />
                                </div>
                            </div>
                            @endrole

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-plus-square me-2"></i>
                                    {{ __('Create Task') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>