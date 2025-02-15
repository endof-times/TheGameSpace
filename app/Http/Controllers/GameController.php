<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Helpers\GetGlobData;

class GameController extends Controller
{
    //Return home view
    function home(Game $id)
    {
        $latestGames = $id->orderByDesc('Year');
        $favorites = GetGlobData::Favorites();

        return view('home', [
            'latestGames' => $latestGames->paginate(30),
            'favorites' => $favorites,
        ]);
    }

    //Return bestsellers view
    function bestsellers(Game $id)
    {
        $bestsellers = $id->orderByDesc('Global_Sales')->paginate(30);
        return view('bestsellers', [
            'bestsellers' => $bestsellers,
        ]);
    }

    //Return mostdiscussed view
    function mostdiscussed()
    {
        $mostdiscussed = 50;
        return view('mostdiscussed', [
            'mostdiscussed' => $mostdiscussed,
        ]);
    }

    //Ajax search request
    function search(Game $id)
    {
        if (request()->has('term')) {
            $resp = $id->where('Name', 'like', '%' . request()->get('term') . '%')->get();
            return response()->json($resp);
        }
        return redirect()->route('home');
    }

    //Return game page view
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

    //Return platforms view
    function platforms()
    {
        $platforms = ["Wii","NES","GB","DS","X360","PS3","PS2","SNES","GBA","3DS","PS4","N64","PS","XB","PC","2600","PSP","XOne","GC","WiiU","GEN","DC","PSV","SAT","SCD","WS","NG","TG16","3DO","GG","PCFX"];
        return view("platforms", [
            "platforms" => $platforms,
        ]);
    }

    //Return all games from selected platform
    function platform(Game $id){
        $plat = request()->get("plat");
        $selectedPlat = $id->where("Platform", "=", $plat)->get();
        return view("shared.platform", ["platformGames"=> $selectedPlat, "platform" => $plat]);
    }
}
