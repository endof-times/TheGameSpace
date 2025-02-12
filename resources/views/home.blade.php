@extends('shared.layout')
@section('content')
    <div id="AuthorsChoise">
        <div id="Slideshow" class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <div class="glide__slide__text">
                            <p>{{ $superMario[0]->Name }}</p>
                            <p>{{ $superMario[0]->Platform }}</p>
                            <p>{{ $superMario[0]->Publisher }}</p>
                            <p>{{ $superMario[0]->Year }}</p>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="glide__slide__text">
                            <p>{{ $nba[0]->Name }}</p>
                            <p>{{ $nba[0]->Platform }}</p>
                            <p>{{ $nba[0]->Publisher }}</p>
                            <p>{{ $nba[0]->Year }}</p>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="glide__slide__text">
                            <p>{{ $assassinsCreed[0]->Name }}</p>
                            <p>{{ $assassinsCreed[0]->Platform }}</p>
                            <p>{{ $assassinsCreed[0]->Publisher }}</p>
                            <p>{{ $assassinsCreed[0]->Year }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <script type="module">
            new Glide(".glide",{
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
