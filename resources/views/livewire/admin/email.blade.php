<div>
    <link href="{{asset('css/admin/bootstrap.min.css')}}" rel="stylesheet">
    <div class="wrapper">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users'))active @endif" aria-current="page" href="{{route('admin.users')}}">Пользователи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.plants'))active @endif" aria-current="page" href="{{route('admin.plants')}}">Растения</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.email'))active @endif" aria-current="page" href="{{route('admin.email')}}">Почта</a>
            </li>
        </ul>
        <div>
            почта
        </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</div>
