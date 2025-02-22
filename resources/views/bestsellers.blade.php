@extends('shared.layout')
@section('content')
    <div class="gamesListContainer elementScroll">
        <div class="gamesCardContainer">
            <h2>Best Sellers</h2>
            @foreach ($bestsellers as $game)
            @include('shared.gamescard')
            @endforeach
        </div>
    </div>
    {{ $bestsellers->links() }}
@endsection
