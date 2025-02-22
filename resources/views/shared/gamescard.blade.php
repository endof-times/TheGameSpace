<div class="gamesCard">
    <img src="https://placehold.co/1920x1080/131313/F5F5F5/?text=Game" alt="GamesCardImg" class="gamesCardImg">
    <div class="gamesCardText">
        <h3 class="name">{{ $game->Name }}</h3>
        <p><span>{{ $game->Year ? $game->Year : "N/A" }}</span> - <span class="platform">{{ $game->Platform }}</span> - <span>Comments: {{ $game->comments->count() }}</span></p>
        <p><span>Publisher: {{ $game->Publisher }}</span> || <span>Global sales: {{ $game->Global_Sales }}Mln</span></p>
    </div>
</div>
