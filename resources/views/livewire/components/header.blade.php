<header class="header">
    <div class="header-wrapper header-desktop">
        <nav class="header-nav-home">
            <a class="header-nav-link @if(Request::route()->getName() == 'home') header-nav-this-page @endif" href="{{ route('home') }}" title="home-page">
                <img class="header-my-plants-text" src="{{ asset('images/header/logo.svg') }}" alt="logo">
            </a>
        </nav>

        @auth
            <nav class="header-center-nav">
                <a class="header-nav-link @if(Request::route()->getName() == 'my-garden') header-nav-this-page @endif"
                   href="{{ route('my-garden') }}">мой сад</a>
                <a class="header-nav-link @if(Request::route()->getName() == 'care-today') header-nav-this-page @endif"
                   href="{{route('care-today')}}">уход сегодня</a>
                <a class="header-nav-link @if(Request::route()->getName() == 'like-other') header-nav-this-page @endif"
                   href="{{route('like-other')}}">как у других</a>
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
                            <a class="header-nav-link header-drop-down-nav-link @if(Request::route()->getName() == 'profile') header-nav-this-page @endif" href="{{ route('profile') }}">
                                профиль
                            </a>
                        </div>

                        <form class="header-logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="header-drop-down-wrapper header-svg-exit">
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
                <a class="header-nav-link @if(Request::route()->getName() == 'login') header-nav-this-page @endif" href="{{route('login')}}">Вход</a>
                <a class="header-nav-link @if(Request::route()->getName() == 'register') header-nav-this-page @endif" href="{{ route('register') }}">Регистрация</a>
            </nav>
        @endauth
    </div>
    <div class="header-wrapper header-mobile">
        <nav class="header-nav-home">
            <a class="header-nav-link @if(Request::route()->getName() == 'home') header-nav-this-page @endif" href="{{ route('home') }}" title="home-page">
                <img class="header-my-plants-text" src="{{ asset('images/header/logo.svg') }}" alt="logo">
            </a>
        </nav>

        @auth
            <div class="header-profile" id="profile">
                <svg id="menu" data-name="menu" class="menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.03 42.03">
                    <rect width="42.03" height="42.03" style="fill: #fff; stroke-width: 0px;"/>
                    <path d="M41.01,9.52H1.01C.45,9.52,0,9.07,0,8.52s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                    <path d="M41.01,21.56H1.01C.45,21.56,0,21.11,0,20.56s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                    <path d="M41.01,33.6H1.01c-.55,0-1-.45-1-1s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                </svg>
            </div>
            <nav class="header-drop-down" id="drop-down-mobile">
                <div class="header-drop-down-box" id="drop-down-box">
                    <div class="header-drop-down-wrapper">
                        <a class="header-nav-link @if(Request::route()->getName() == 'my-garden') header-nav-this-page @endif"
                           href="{{ route('my-garden') }}">мой сад</a>
                        <a class="header-nav-link @if(Request::route()->getName() == 'care-today') header-nav-this-page @endif"
                           href="{{route('care-today')}}">уход сегодня</a>
                        <a class="header-nav-link @if(Request::route()->getName() == 'like-other') header-nav-this-page @endif"
                           href="{{route('like-other')}}">как у других</a>
                        <a class="header-nav-link @if(Request::route()->getName() == 'profile') header-nav-this-page @endif" href="{{ route('profile') }}">
                            профиль
                        </a>
                        <form class="header-logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="header-logout-button header-nav-link">
                                выход
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        @else
            <div class="header-profile" id="profile">
                <svg id="menu" data-name="menu" class="menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.03 42.03">
                    <rect width="42.03" height="42.03" style="fill: #fff; stroke-width: 0px;"/>
                    <path d="M41.01,9.52H1.01C.45,9.52,0,9.07,0,8.52s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                    <path d="M41.01,21.56H1.01C.45,21.56,0,21.11,0,20.56s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                    <path d="M41.01,33.6H1.01c-.55,0-1-.45-1-1s.45-1,1-1h40c.55,0,1,.45,1,1s-.45,1-1,1Z" style="fill: #77afaf; stroke-width: 0px;"/>
                </svg>
            </div>
            <nav class="header-drop-down" id="drop-down-mobile">
                <div class="header-drop-down-box" id="drop-down-box">
                    <div class="header-drop-down-wrapper">
                        <a class="header-nav-link @if(Request::route()->getName() == 'login') header-nav-this-page @endif" href="{{route('login')}}">Вход</a>
                        <a class="header-nav-link @if(Request::route()->getName() == 'register') header-nav-this-page @endif" href="{{ route('register') }}">Регистрация</a>
                    </div>
                </div>
            </nav>
        @endauth
        <script>
            document.getElementById("menu").addEventListener("click", function() {
                document.getElementById("drop-down-mobile").classList.add("open");
                function sleep (time) {
                    return new Promise((resolve) => setTimeout(resolve, time));
                }
                sleep(5000).then(() => {
                    document.getElementById("drop-down-mobile").classList.remove("open");
                });
            });
        </script>
    </div>
</header>
