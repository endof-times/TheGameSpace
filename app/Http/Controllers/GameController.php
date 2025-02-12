<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    function home(Game $id)
    {
        $latestGames = $id->orderByDesc('Year');
        $superMario = $id->where('Name', 'like', 'New Super Mario Bros.')->get();
        $nba = $id->where('Name', 'like', 'NBA 2K14')->where("Platform", "=", "PS4")->get();
        $assassinsCreed = $id->where('Name', 'like', "Assassin's Creed II")->get();

        return view('home', [
            'latestGames' => $latestGames->paginate(30),
            'superMario' => $superMario,
            'nba' => $nba,
            'assassinsCreed' => $assassinsCreed
        ]);
    }

    function bestsellers(Game $id)
    {
        $bestsellers = $id->orderByDesc('Global_Sales')->paginate(10);
        return view('bestsellers', [
            'bestsellers' => $bestsellers,
        ]);
    }
    function mostdiscussed()
    {
        $mostdiscussed = 50;
        return view('mostdiscussed', [
            'mostdiscussed' => $mostdiscussed,
        ]);
    }

    function search(Game $id) {
        if(request()->has("term")){
            $resp = $id->where("Name", "like", "%". request()->get("term") ."%")->get();
            return response()->json($resp);
        }
        return redirect()->route("home");
    }

    function show(Game $id){
        $gameName = request()->get("game");
        $gamePlatform = request()->get("platform");
        if(request()->has("game")){
            $selectedGame = $id->where("Name", "=", $gameName)->where("Platform", "=", $gamePlatform )->get();
        };
        return view("shared.game",[
            "game" => $selectedGame
        ]);
    }
}
