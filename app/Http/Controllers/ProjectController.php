<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Project $project) {
        $tasks = $project->tasks()->with('assignee')->get();
        $teamMembers = $project->team->users; // All users in the team
        return view('projects.show', compact('project', 'teamMembers', 'tasks'));
    }
    
//   public function show(Request $request, Project $project) {
//         dd(auth()->user()->projects());
//         if($request->user()->hasRole('admin')){
//             // Admin can view all projects
//             $project = Project::findOrFail($project->id);
//         } else {
//             // Regular users can only view their own projects
//             $project = auth()->user()->projects()->findOrFail($project->id);
//         }
//         // $project->load(['tasks.assignee', 'team.users']);

//         $teamMembers = $project->team->users; // All users in the team
//         $tasks = $project->tasks()->with('assignee')->get();
//         return view('projects.show', compact('project', 'teamMembers', 'tasks'));
//     }


    public function create() {
        $team_id = request()->query('team_id');
        return view('projects.create', compact('team_id'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->team_id = $request->team_id; // Assuming team_id is passed in the request
        $project->save();

        return redirect()->route('projects.show', $project)->with('success', 'Project created successfully.');
    }

}
