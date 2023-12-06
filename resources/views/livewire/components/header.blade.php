<header class="header">
    <div class="header-wrapper">
        <nav class="header-nav-home">
            <a wire:navigate class="header-nav-link @if(Request::route()->getName() == 'home') header-nav-this-page @endif" href="{{ route('home') }}" title="home-page">
                <img class="header-my-plants-text" src="{{ asset('images/header/logo.svg') }}" alt="logo">
            </a>
        </nav>

        @auth
            <nav class="header-center-nav">
                <a wire:navigate class="header-nav-link @if(Request::route()->getName() == 'my-plants') header-nav-this-page @endif" href="{{ route('my-plants') }}">мой сад</a>
                <a wire:navigate class="header-nav-link @if(Request::route()->getName() == 'care-today') header-nav-this-page @endif" href="{{route('care-today')}}">уход сегодня</a>
                <a wire:navigate class="header-nav-link {{--@if(Request::route()->getName() == 'header-care-today') nav-this-page @endif--}}" href="#">как у других</a>
            </nav>
            <div class="header-profile" id="profile">
                <img class="header-profile-image-src" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->image)}}" alt="profile">
                <div class="header-profile-image-animate"></div>
            </div>
                <nav class="header-drop-down" id="drop-down">
                    <div class="header-drop-down-box" id="drop-down-box">
                        <div class="header-drop-down-wrapper header-svg-profile">
                            <svg class="header-svg-profile" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                                <path d="m10.5.5C4.98.5.5,4.98.5,10.5s4.48,10,10,10,10-4.48,10-10S16.02.5,10.5.5Zm-4.46,14.96c0-2.47,2-4.46,4.46-4.46-1.44,0-2.61-1.17-2.61-2.61s1.17-2.61,2.61-2.61,2.61,1.17,2.61,2.61-1.17,2.61-2.61,2.61c2.47,0,4.46,2,4.46,4.46H6.04Z" style="fill:none; stroke-linecap:round; stroke-linejoin:round;"/>
                            </svg>
                            <a wire:navigate class="header-nav-link header-drop-down-nav-link @if(Request::route()->getName() == 'profile') header-nav-this-page @endif" href="{{ route('profile') }}">
                                профиль
                            </a>
                        </div>

                        {{--<a wire:navigate class="header-nav-link header-mobile @if(Request::route()->getName() == 'my-plants') header-nav-this-page @endif" href="{{ route('my-plants') }}">мой сад</a>
                        <a wire:navigate class="header-nav-link header-mobile @if(Request::route()->getName() == 'care-today') header-nav-this-page @endif" href="{{route('care-today')}}">уход сегодня</a>--}}

                        <form class="header-logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="header-drop-down-wrapper svg-exit">
                                <svg class="header-svg-exit" xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21">
                                    <polyline points="9.75 15.87 15.5 10.43 9.87 4.92" style="fill:none;  stroke-linecap:round; stroke-linejoin:round;"/>
                                    <line x1="5.57" y1="10.39" x2="15.28" y2="10.39" style="fill:none; stroke-linecap:round; stroke-linejoin:round;"/>
                                    <polyline points="10.12 .5 .5 .5 .5 20.5 10.12 20.5" style="fill:none; stroke-linecap:round; stroke-linejoin:round;"/>
                                </svg>
                                <button type="submit" class="header-logout-button header-nav-link header-drop-down-nav-link">
                                    выход
                                </button>
                            </div>
                        </form>
                    </div>
                </nav>

            <script>
                document.getElementById("profile").addEventListener("click", function() {
                    document.getElementById("drop-down").classList.add("open");
                    function sleep (time) {
                        return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    sleep(5000).then(() => {
                        document.getElementById("drop-down").classList.remove("open");
                    });
                });
            </script>
        @else
            <nav class="header-auth-nav">
                <a wire:navigate class="header-nav-link @if(Request::route()->getName() == 'login') header-nav-this-page @endif" href="{{route('login')}}">Вход</a>
                <a wire:navigate class="header-nav-link @if(Request::route()->getName() == 'register') header-nav-this-page @endif" href="{{ route('register') }}">Регистрация</a>
            </nav>
        @endauth
    </div>
</header>
