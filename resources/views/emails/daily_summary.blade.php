<x-mail::message>
# Hello {{ $user->name }}

Here are the tasks assigned to you in the last 24 hours:

@foreach ($tasks as $task)
- **{{ $task->title }}** (Status: {{ $task->status }})
@endforeach

Thanks,<br>
Task Manager
</x-mail::message>