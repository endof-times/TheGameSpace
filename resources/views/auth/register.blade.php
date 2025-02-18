@extends("shared.layout")
@section("content")
    <form action="{{ route("register") }}" method="post" id="RegisterForm">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        @error("name")
            <span>{{ $message }}</span>
        @enderror
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        @error("email")
            <span>{{ $message }}</span>
        @enderror
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        @error("password")
            <span>{{ $message }}</span>
        @enderror
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation">

        <label for="image">Image</label>
        <input type="file" accept="image/*" name="image" id="profile_image">
        @error("image")
            <span>{{ $message }}</span>
        @enderror
        <label for="bio">Bio: </label>
        <textarea name="bio" id="Bio" cols="30" rows="10"></textarea>
        @error("bio")
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" value="Register">
    </form>
@endsection
