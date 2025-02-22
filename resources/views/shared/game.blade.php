@extends('shared.layout')
@section('content')
    <div id="GameContainer">
        <div id="DisplayGame">
            <div id="GameInfo">
                <img src="https://placehold.co/1920x1080/131313/F5F5F5/?text=Game" alt="GameImage">
                <div id="GameInfoText">
                    <p>Name: {{ $game->Name }}</p>
                    <p>Platform: {{ $game->Platform }}</p>
                    <p>Year: {{ $game->Year ? $game->Year : 'N/A' }}</p>
                    <p>Genre: {{ $game->Genre }}</p>
                    <p>Publisher: {{ $game->Publisher }}</p>
                </div>
            </div>
            <div id="CommentSection">
                @guest
                    <p class="loginToComment">Login to leave a comment</p>
                @endguest
                @auth
                    <form action="{{ route('commentSubmit', [Auth::user()->id, $game->id]) }}" id="CommentSubmit" method="post">
                        @csrf
                        <textarea name="comment" id="Comment" cols="60" rows="5" autofocus></textarea>
                        <input type="submit" id="CommentSubmitBtn" value="Submit Comment">
                    </form>
                    @error("comment")
                    <p id="CommentErrorMsg">{{ $message }}</p>
                    @enderror
                @endauth
                <div id="ShowComments">
                    @foreach ($game->comments as $comment)
                        <div id="CommentCard">
                            <h3>{{ $comment->user->name }}: </h3>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
