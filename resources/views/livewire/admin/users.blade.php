<div>
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
                <div>
                    <h2>Пользователи</h2>
                    <form wire:submit="search" class="d-flex">
                        <input wire:model="searchInput" class="form-control me-2" type="search" placeholder="Поиск по email" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" style="vertical-align: middle;">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Почта</th>
                            <th scope="col">Права</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Последнее обновление</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($searchResult)
                            @foreach($searchResult as $user)
                                <tr style="color: #FFFFFF; background-color: #004445">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{($user->is_admin) ? 'admin' : 'user'}}</td>
                                    <td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($user->image)}}" alt="profile" width="50px" height="50px">
                                    </td>
                                    <td>{{$user->updated_at}}</td>
                                    <td><a href="{{route('admin.edit.user',['user'=>$user->id])}}"><button type="button" class="btn btn-primary btn-sm">изменить</button></a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm">Удалить</button></td>
                                </tr>
                            @endforeach
                        @endif
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{($user->is_admin) ? 'admin' : 'user'}}</td>
                            <td>
                                <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($user->image)}}" alt="profile" width="50px" height="50px">
                            </td>
                            <td>{{$user->updated_at}}</td>
                            <td><a href="{{route('admin.edit.user',['user'=>$user->id])}}"><button type="button" class="btn btn-primary btn-sm">изменить</button></a></td>
                            <td><button wire:click="delete({{$user->id}})" wire:confirm="Вы точно хотите удалить {{$user->name}} email: {{$user->email}}?" type="button" class="btn btn-danger btn-sm">Удалить</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $users->links() }}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</div>
