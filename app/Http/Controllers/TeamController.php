<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;

class TeamController extends Controller
{
    public function show(Team $team) {
        $projects = $team->projects()->with('tasks')->get();
        $teamMembers = $team->users()->get();
        $totalTasks = $projects->sum(function($project) {
            return $project->tasks->count();
        });
        return view('teams.show', compact('team', 'projects', 'teamMembers', 'totalTasks'));
}

    public function create() {
        return view('teams.create');
    }
    
    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->save();

        // Attach the authenticated user to the team
        $team->users()->attach(auth()->id());

        return redirect()->route('teams.show', $team)->with('success', 'Team created successfully.');
    }

    public function assign(Request $request) {
        // dd(TeamUser::all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
        ]);
       
        $team = Team::findOrFail($request->input('team_id'));
        $user = User::findOrFail($request->input('user_id'));

        $checkExisting = TeamUser::where(['user_id' => $user->id, 'team_id' => $team->id])->exists();
        
        if ($checkExisting) {
            return back()->with('error', 'User is already assigned to this team.');
        }

        $team->users()->attach($user);

        return back()->with('success', 'User assigned to team successfully.');
    }
}
