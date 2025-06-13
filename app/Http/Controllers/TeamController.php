<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function show(Team $team) {
        $projects = $team->projects()->with('tasks')->get();
        return view('teams.show', compact('team', 'projects'));
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
}
