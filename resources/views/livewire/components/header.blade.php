<header class="header">
    <div class="header-wrapper">
        <nav class="header-nav-home">
            <a wire:navigate class="nav-link @if(Request::route()->getName() == 'home') nav-this-page @endif" href="{{ route('home') }}" title="home-page">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                </svg>
            </a>
        </nav>

        @auth
            <nav class="center-nav">
                <a wire:navigate class="nav-link @if(Request::route()->getName() == 'my-plants') nav-this-page @endif" href="{{ route('my-plants') }}">Мои Растения</a>
                <a wire:navigate class="nav-link @if(Request::route()->getName() == 'care-today') nav-this-page @endif" href="{{route('care-today')}}">Уход Сегодня</a>
            </nav>
            <div class="profile" id="profile">
                <img class="profile-image" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->image)}}" alt="profile">
                <span class="nav-link">{{Auth::user()->name}}</span>
                <nav class="drop-down" id="drop-down">
                    <div class="drop-down-box" id="drop-down-box">
                        <a wire:navigate class="nav-link @if(Request::route()->getName() == 'profile') nav-this-page @endif" href="{{ route('profile') }}">Профиль</a>
                        <a wire:navigate class="nav-link mobile @if(Request::route()->getName() == 'my-plants') nav-this-page @endif" href="{{ route('my-plants') }}">Мои Растения</a>
                        <a wire:navigate class="nav-link mobile @if(Request::route()->getName() == 'care-today') nav-this-page @endif" href="{{route('care-today')}}">Уход Сегодня</a>
                        <form class="logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="logout-button nav-link">Выйти</button>
                        </form>
                    </div>
                </nav>
            </div>
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
            <nav class="header-nav">
                <a wire:navigate class="nav-link @if(Request::route()->getName() == 'login') nav-this-page @endif" href="{{route('login')}}">Вход</a>
                <a wire:navigate class="nav-link @if(Request::route()->getName() == 'register') nav-this-page @endif" href="{{ route('register') }}">Регистрация</a>
            </nav>
        @endauth
    </div>
</header>
