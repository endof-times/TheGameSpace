@extends('shared.layout')
@section('content')
    <form action="{{ route('login') }}" method="post" id="LoginForm">
        @csrf
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" value="Log In">
    </form>
@endsection
