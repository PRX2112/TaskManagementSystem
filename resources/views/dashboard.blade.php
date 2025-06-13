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
                    {{ __('Teams') }}
                </span>
                <a href="{{ route('teams.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Add Team
                </a>
            </div>
            @foreach ($teams as $team)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('teams.show', ['team' => $team->id]) }}" class="text-blue-600 hover:underline">
                            {{ $team->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
