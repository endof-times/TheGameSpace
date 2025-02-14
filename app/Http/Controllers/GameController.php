<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Helpers\GetGlobData;

class GameController extends Controller
{
    function home(Game $id)
    {
        $latestGames = $id->orderByDesc('Year');
        $favorites = GetGlobData::Favorites();

        return view('home', [
            'latestGames' => $latestGames->paginate(30),
            'favorites' => $favorites,
        ]);
    }

    function bestsellers(Game $id)
    {
        $bestsellers = $id->orderByDesc('Global_Sales')->paginate(30);
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

    function platforms()
    {
        $platforms = GetGlobData::Platforms("database/data/vgsales.csv");
        return view("platforms", [
            "platforms" => $platforms,
        ]);
    }

    function platform(Game $id){
        $plat = request()->get("plat");
        $selectedPlat = $id->where("Platform", "=", $plat)->get();
        return view("shared.platform", ["platformGames"=> $selectedPlat, "platform" => $plat]);
    }
}
