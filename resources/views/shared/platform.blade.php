@extends('shared.layout')
@section('content')
    <div class="gamesListContainer">
        <div class="gamesCardContainer">
            <div id="PageSettings">
                <h2>Platform: {{ $platform }}</h2>
                <select name="{{ $platform }}" id="PlatformSort">
                    <option value="">--Select Sort Order--</option>
                    <option value="Alphabetical" {{ request()->get('sortorder') == 'Alphabetical' ? 'selected' : '' }}>
                        Alphabetical</option>
                    <option value="Latest" {{ request()->get('sortorder') == 'Latest' ? 'selected' : '' }}>Latest
                    </option>
                    <option value="GlobSales" {{ request()->get('sortorder') == 'GlobSales' ? 'selected' : '' }}>
                        GlobSales</option>
                    <option value="MostDiscussed" {{ request()->get('sortorder') == 'MostDiscussed' ? 'selected' : '' }}>
                        MostDiscussed</option>
                </select>
            </div>
            @if ($platformGames->count() > 0)
                @foreach ($platformGames as $game)
                    @include('shared.gamescard')
                @endforeach
            @else
                <p>No results found</p>
            @endif
        </div>
        {{ $platformGames->appends($_GET)->links() }}
    </div>
@endsection
