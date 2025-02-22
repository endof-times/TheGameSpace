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
    function mostdiscussed(Game $id)
    {
        $games = $id->has('comments', ">", 0)->paginate(30);
        $games = GetGlobData::BubbleSort($games);
        return view('mostdiscussed', [
            'mostdiscussed' => $games,
        ]);
    }

    //Ajax search request
    function search(Game $id)
    {
        if (request()->has('term')) {
            $resp = $id->where('Name', 'like', '%' . request()->get('term') . '%')->get();
            return response()->json($resp);
        }
    }

    //Return game page view
    function show(Game $id)
    {
        $gameName = request()->get('game');
        $gamePlatform = request()->get('platform');
        if (request()->has('game')) {
            $game = $id->where('Name', '=', $gameName)->where('Platform', '=', $gamePlatform)->get();
        }

        $selectedGame = $game[0];

        return view('shared.game', [
            'game' => $selectedGame,
        ]);
    }

    //Return platforms view
    function platforms()
    {
        $platforms = GetGlobData::$Platforms;
        return view('platforms', [
            'platforms' => $platforms,
        ]);
    }

    //Return all games from selected platform
    function platform(Game $id)
    {
        $plat = request()->get('plat');
        $selectedPlat = $id->where('Platform', '=', $plat)->paginate(30);

        if (request()->has('sortorder')) {
            if (request()->get('sortorder') == 'Alphabetical') {
                $selectedPlat = $id->where('Platform', '=', $plat)->orderBy('Name')->paginate(30);
            } elseif (request()->get('sortorder') == 'Latest') {
                $selectedPlat = $id->where('Platform', '=', $plat)->orderByDesc('Year')->paginate(30);
            } elseif (request()->get('sortorder') == 'GlobSales') {
                $selectedPlat = $id->where('Platform', '=', $plat)->orderByDesc('Global_Sales')->paginate(30);
            } else if(request()->get('sortorder') == 'MostDiscussed'){
                $selectedPlat = $id->has('comments', '>', 0)->where('Platform', '=', $plat)->paginate(30);
                $selectedPlat = GetGlobData::BubbleSort($selectedPlat);
            }
        }

        return view('shared.platform', ['platformGames' => $selectedPlat, 'platform' => $plat]);
    }
}
