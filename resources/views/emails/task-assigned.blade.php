<div style="font-family: Arial, sans-serif; color: #333;">
    <h2 style="color: #2d3748; margin-bottom: 16px;">&#35; New Task Assigned</h2>
    <p>
        Hello <strong>{{ $task->user->name }}</strong>,
    </p>
    <p>
        You have been assigned a new task in the project <strong>{{ $task->project->name }}</strong>.
    </p>
    <table style="margin: 16px 0; border-collapse: collapse;">
        <tr>
            <td style="padding: 4px 8px; font-weight: bold;">Task Title:</td>
            <td style="padding: 4px 8px;">{{ $task->title }}</td>
        </tr>
        <tr>
            <td style="padding: 4px 8px; font-weight: bold;">Status:</td>
            <td style="padding: 4px 8px;">{{ ucfirst($task->status) }}</td>
        </tr>
    </table>
    <p>
        Thanks,<br>
        <strong>{{ config('app.name') }}</strong>
    </p>
</div>
