<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teams = auth()->user()->teams;
        return view('dashboard', compact('teams'));
    }
}
