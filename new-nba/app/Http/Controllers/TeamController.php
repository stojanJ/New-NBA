<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{
    public function index(){
        $teams= Team::all();
        return view('Teams', compact('teams'));
    }

    public function show(Team $id){
        $players= Player::with('team')->get();
        $team = Team::with('players', )->find($id);
        return view('teams.show', compact('players', 'team'));
    }
}
