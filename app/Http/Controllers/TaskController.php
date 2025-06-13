<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignTaskRequest;
use App\Mail\TaskAssignedMail;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\Contracts\TaskAssignmentServiceInterface;

class TaskController extends Controller
{

    public function __construct(protected TaskAssignmentServiceInterface $taskAssignmentService) {}

    public function assign(AssignTaskRequest $request, Task $task)
    {
        $user = User::findOrFail($request->input('assignee_id'));
        $this->taskAssignmentService->assign($task, $user);

        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        // ]);

        // $task->user_id = $request->user_id;
        // $task->save();

        // // Queue email
        // Mail::to($task->user->email)->queue(new TaskAssignedMail($task));

        // // Log activity (optional)
        // activity()
        //     ->causedBy(auth()->user())
        //     ->performedOn($task)
        //     ->log("Task assigned to {$task->user->name}");

        return back()->with('success', 'Task assigned successfully and notification sent.');
    }

    public function create()
    {
        $project_id = request()->query('project_id');
        return view('tasks.create', compact('project_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->project_id = $request->project_id; // Assuming project_id is passed in the request
        $task->status = 'pending'; // Default status
        $task->save();

        return redirect()->route('projects.show', ['project' => $task->project_id])->with('success', 'Task created successfully.');
    }
}
