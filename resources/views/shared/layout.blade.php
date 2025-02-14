<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.core.css">
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <title>{{ env('APP_NAME') }}</title>
</head>

<body>
    @guest
        <div id="Header">To leave a comment <a href="{{ route('register') }}">Register</a>.Or <a
                href="{{ route('login') }}">Login</a> if you already have an account.</div>
    @endguest
    <div id="NavBar">
        <div id="LogoContainer">
            <img src="{{ Vite::asset('resources/media/TGSPurple.png') }}" alt="Logo">
        </div>
        <nav id="Navigation">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('bestsellers') }}">Best Sellers</a>
            <a href="{{ route('mostdiscussed') }}">Most discussed</a>
            <a href="{{ route('platforms') }}">Platforms</a>
        </nav>
        <div id="SearchBar">
            <input type="text" name="SearchReviews" id="SearchBox" autocomplete="off">
            <span id="SearchButton">Search</span>
        </div>
        <div id="SearchResults">
        </div>
        <div id="Settings">
            <button>&#x2630</button>
            <div id="SettingsMenu">
                <button>Tema</button>
                <select name="Lingua" id="lingua">
                    <option value="Seleziona">---Select Lang---</option>
                </select>
            </div>
        </div>
    </div>

    @yield('content')
    <div id="Footer">
        <div id="Overview">Overview</div>
        <div id="FollowUs">Follow Us</div>
        <div id="Explore">Explore</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/glide.min.js"></script>
</body>

</html>
