<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-2">
                <span class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tasks') }}
                </span>
                <a href="{{ route('tasks.create',['project_id'=>$project->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Add Task
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 text-lg">
                    <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="text-blue-600 hover:underline">
                        Project : {{ $project->name }}
                    </a>
                </div>
                @foreach ($tasks as $task)
                <div class="flex">
                    <div class="p-6 text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-50 flex-1">
                            <span>{{ $task->title }}</span></br>
                            <span class="text-sm">{{ $task->description }}</span></br>
                            <span class="text-sm text-gray-600">Created {{ $task->created_at->diffForHumans() }} | <b>{{ $task->status}}</b></span>
                    </div>
                    <div class="p-6 text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-50 flex-1">
                        @if($task->assignee)
                            <span>Assigned to: <b>{{ $task->assignee->name }}</b></span>
                        @else
                            <span>Not assigned</span>
                        @endif
                    </div>
                    @role('admin')
                    <div class="flex-1 p-6 text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-50">
                    @if ($task->status == 'pending' || $task->status == 'in_progress')
                        <form action="{{ route('tasks.assign', $task->id) }}" method="POST" class="d-flex gap-2 align-items-center p-6 text-gray-900 bg-white hover:bg-gray-50 flex-1">
                            @csrf
                            <select name="assignee_id" required>
                                <option value="">Select Team Member</option>
                                @foreach($teamMembers as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="">Assign</button>
                        </form>
                    @endif
                    </div>
                    @endrole
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</x-app-layout>
