<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignTaskRequest;
use App\Mail\TaskAssignedMail;
use App\Models\Project;
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
        return back()->with('success', 'Task assigned successfully and notification sent.');
    }

    public function create()
    {
        $project_id = request()->query('project_id');
        $project = Project::findOrFail($project_id);
        $teamMembers = $project->team->users; // All users in the team
        return view('tasks.create', compact('project', 'teamMembers'));
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
        $task->project_id = $request->project_id;
        if($request->has('assigned_to')) {
            $task->user_id = $request->assigned_to; // Optional assignee
            $task->status = 'in_progress'; 
        }else{
            $task->user_id = null; // No assignee if not provided
            $task->status = 'pending'; // Status for unassigned tasks
        }
        if($task->save()){
            if ($task->user_id) {
                $assignee = User::find($task->user_id);
                Mail::to($assignee->email)->queue(new TaskAssignedMail($task));
            }
        }

        return redirect()->route('projects.show', ['project' => $task->project_id])->with('success', 'Task created successfully.');
    }
}
