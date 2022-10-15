<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function show(Player $id){
        $player = Player::find($id)->first();
        return view('players.show', compact('player'));
    }
}
