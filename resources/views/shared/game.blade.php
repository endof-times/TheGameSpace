@extends('shared.layout')
@section('content')
    <div id="GameContainer">
        <div id="DisplayGame">
            <div id="GameInfo">
                <img src="https://placehold.co/1920x1080/131313/F5F5F5/?text=Game" alt="GameImage">
                <div id="GameInfoText">
                    <p>Name: {{ $game[0]->Name }}</p>
                    <p>Platform: {{ $game[0]->Platform }}</p>
                    <p>Year: {{ $game[0]->Year ? $game[0]->Year : "N/A" }}</p>
                    <p>Genre: {{ $game[0]->Genre }}</p>
                    <p>Publisher: {{ $game[0]->Publisher }}</p>
                </div>
            </div>
            @guest
                <p class="loginToComment">Login to leave a comment</p>
            @endguest
        </div>
    </div>
@endsection
