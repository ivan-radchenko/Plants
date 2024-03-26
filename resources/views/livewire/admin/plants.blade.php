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
        <div class="container-fluid">
            <div class="row">
                <h2>Растения</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" style="vertical-align: middle;">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">isAdmin</th>
                            <th scope="col">LastUpdate</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1,001</td>
                            <td>random</td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</div>
