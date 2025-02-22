@extends('shared.layout')
@section('content')
    <div class="gamesListContainer elementScroll">
        <div class="gamesCardContainer">
            <h2>Most Discussed</h2>
            @foreach ($mostdiscussed as $game)
                @include('shared.gamescard')
            @endforeach
        </div>
    </div>
    {{ $mostdiscussed->links() }}
@endsection
