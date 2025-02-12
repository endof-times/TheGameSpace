@extends("shared.layout")
@section("content")
    <form action="{{ route("register") }}" method="post" id="RegisterForm">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <label for="profile_image">Image</label>
        <input type="file" name="profile_image" id="profile_image">
        <input type="submit" value="Register">
    </form>
@endsection
