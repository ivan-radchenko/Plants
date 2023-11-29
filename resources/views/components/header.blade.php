<header class="header">
    <div class="header-wrapper">
        <nav class="header-nav-home">
            <a class="nav-link @if(Request::route()->getName() == 'home') nav-this-page @endif" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                </svg>
            </a>
        </nav>

            @auth
                <nav class="center-nav">
                    <a class="nav-link @if(Request::route()->getName() == 'my-plants') nav-this-page @endif" href="{{ route('my-plants') }}">Мои Растения</a>
                    <a class="nav-link" href="#">Уход Сегодня</a>
                </nav>
            <nav class="profile">
                <a class="nav-link" href="#{{--{{ route('profile') }}--}}">
                    <img class="profile-image" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->image)}}" alt="profile">
                </a>
                <form class="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="logout-button nav-link">Выйти</button>
                </form>
            </nav>
            @else
            <nav class="header-nav">
                <a class="nav-link @if(Request::route()->getName() == 'login') nav-this-page @endif" href="{{route('login')}}">Войти</a>
                <a class="nav-link @if(Request::route()->getName() == 'register') nav-this-page @endif" href="{{ route('register') }}">Регистрация</a>
            </nav>
            @endauth
    </div>
</header>
