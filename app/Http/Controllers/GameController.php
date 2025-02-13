<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    function home(Game $id)
    {
        $latestGames = $id->orderByDesc('Year');
        $fav1 = $id->where('Name', 'like', 'Super Mario Bros.')->where('Platform', '=', 'NES')->get();
        $fav2 = $id->where('Name', 'like', 'NBA 2K14')->where('Platform', '=', 'PS4')->get();
        $fav3 = $id->where('Name', 'like', "Assassin's Creed II")->where('Platform', '=', 'PS3')->get();
        $favorites = [$fav1[0], $fav2[0], $fav3[0]];

        return view('home', [
            'latestGames' => $latestGames->paginate(30),
            'favorites' => $favorites,
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

    function search(Game $id)
    {
        if (request()->has('term')) {
            $resp = $id->where('Name', 'like', '%' . request()->get('term') . '%')->get();
            return response()->json($resp);
        }
        return redirect()->route('home');
    }

    function show(Game $id)
    {
        $gameName = request()->get('game');
        $gamePlatform = request()->get('platform');
        if (request()->has('game')) {
            $selectedGame = $id->where('Name', '=', $gameName)->where('Platform', '=', $gamePlatform)->get();
        }
        return view('shared.game', [
            'game' => $selectedGame,
        ]);
    }
}
