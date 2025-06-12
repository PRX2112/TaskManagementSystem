<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Project $project) {
        $tasks = $project->tasks()->with('assignee')->get();
        return view('projects.show', compact('project', 'tasks'));
    }

}
