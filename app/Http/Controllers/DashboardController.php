<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $teams = Team::all();
        }else{
            $teams = auth()->user()->teams;
        }
        return view('dashboard', compact('teams'));
    }
}
