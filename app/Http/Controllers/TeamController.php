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
}
