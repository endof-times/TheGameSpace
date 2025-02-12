@extends('shared.layout')
@section('content')
    <div id="BestRatings" class="elementScroll">
        <div class="gamesCardContainer">
            @foreach ($bestsellers as $game)
            @include('shared.gamescard')
            @endforeach
        </div>
    </div>
    {{ $bestsellers->links() }}
@endsection
