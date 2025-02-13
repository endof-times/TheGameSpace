@extends('shared.layout')
@section('content')
    <div id="AuthorsChoise">
        <div id="Slideshow" class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($favorites as $game)
                        <li class="glide__slide">
                            <div class="glide__slide__text">
                                <p>{{ $game->Name }}</p>
                                <p>{{ $game->Platform }}</p>
                                <p>{{ $game->Publisher }}</p>
                                <p>{{ $game->Year }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <script type="module">
            new Glide(".glide", {
                startAt: 0,
                perView: 1,
                animationDuration: 800,
                dragThreshold: 10,
            }).mount()
        </script>
    </div>
    <div id="LatestArticles" class="elementScroll">
        <h2>Latest</h2>
        <div class="gamesCardContainer">
            @foreach ($latestGames as $game)
                @include('shared.gamescard')
            @endforeach
        </div>
    </div>
@endsection
