<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                {{ __('Projects') }}
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 text-lg">
                    <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="text-blue-600 hover:underline">
                        Project : {{ $project->name }}
                    </a>
                </div>
                @foreach ($tasks as $task)
                    <div class="p-6 text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-50">
                            <span>{{ $task->title }}</span></br>
                    {{-- </div>
                    <div class="p-6 text-gray-900 text-muted bg-white border-b border-gray-200 hover:bg-gray-50"> --}}
                            <span class="text-sm">{{ $task->description }}</span></br>
                            <span class="text-sm text-gray-600">Created {{ $task->created_at->diffForHumans() }} | <b>{{ $task->status}}</b></span>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</x-app-layout>
