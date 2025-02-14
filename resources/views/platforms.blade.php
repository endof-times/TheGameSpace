@extends('shared.layout')
@section('content')
    <div id="Platforms">
        @foreach ($platforms as $plat)
            <p class="platformsCard">{{ $plat }}</p>
        @endforeach
    </div>
@endsection
