@extends('shared.layout')
@section('content')
    <div class="gamesListContainer">
        <div class="gamesCardContainer">
            <h2>Platform: {{ $platform }}</h2>
            @foreach ($platformGames as $game)
            @include('shared.gamescard')
            @endforeach
        </div>
    </div>
@endsection
