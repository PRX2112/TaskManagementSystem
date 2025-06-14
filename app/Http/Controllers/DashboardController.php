<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $teams = Team::with('users')->get();
            $totalProjects = $teams->sum(function($team) {
                return $team->projects->count();
            });
            $totalTasks = $teams->sum(function($team) {
                return $team->projects->sum(function($project) {
                    return $project->tasks->count();
                });
            });
            $totalMembers = $teams->sum(function($team) {
                return $team->users->count();
            });
            $allUsers = \App\Models\User::whereHas('roles', function($query) {
                $query->where('name', '!=', 'admin');
            })->get();
            return view('dashboard', compact('teams', 'totalProjects', 'totalTasks', 'totalMembers', 'allUsers'));
        }else{
            $teams = auth()->user()->teams;
            return view('dashboard', compact('teams'));
        }
    }
}
