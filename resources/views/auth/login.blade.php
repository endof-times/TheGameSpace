@extends('shared.layout')
@section('content')
<form action="{{ route("login") }}" method="post" id="LoginForm">
    @csrf
    <label for="email">Email: </label>
    <input type="email" name="email" id="email">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Log In">
</form>
@endsection
