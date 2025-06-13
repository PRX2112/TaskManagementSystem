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
                    {{ __('Projects') }}
                </span>
                <a href="{{ route('projects.create',['team_id'=>$team->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Add Project
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 text-lg">
                    <a href="{{ route('teams.show', ['team' => $team->id]) }}" class="text-blue-600 hover:underline">
                        Team : {{ $team->name }}
                    </a>
                </div>

                @foreach ($projects as $project)
                    <div class="p-6 text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-50">
                        <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="text-blue-600 hover:underline">
                            {{ $project->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
