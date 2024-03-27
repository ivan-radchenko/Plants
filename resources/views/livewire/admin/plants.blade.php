<div>
    <div class="wrapper">
        <ul class="nav nav-tabs" wire:ignore>
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
                    <h2>Растения</h2>
                    <form wire:submit="search" class="d-flex">
                        <input wire:model="searchInput" class="form-control me-2" type="search" placeholder="Поиск по названию или email" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" style="vertical-align: middle;text-align: center;" >
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Полив лето</th>
                            <th scope="col">Полив зима</th>
                            <th scope="col">Свет лето</th>
                            <th scope="col">Свет зима</th>
                            <th scope="col">Свет</th>
                            <th scope="col">Влажность</th>
                            <th scope="col">Заметки</th>
                            <th scope="col">Status</th>
                            <th scope="col">Последний полив</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата обновления</th>
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($searchResult)
                        @foreach($searchResult as $plant)
                            <tr wire:key="search{{$plant->id}}" style="color: #FFFFFF; background-color: #004445">
                                <td>{{$plant->id}}</td>
                                <td>{{$plant->name}}</td>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($plant->image)}}" alt="plant" width="50px" height="50px">
                                </td>
                                <td>{{$plant->user->email}}</td>
                                <td>{{$plant->waterSummer}}</td>
                                <td>{{$plant->waterWinter}}</td>
                                <td>{{$plant->lightSummer}}</td>
                                <td>{{$plant->lightWinter}}</td>
                                <td>{{$plant->light}}</td>
                                <td>{{$plant->wet}}</td>
                                <td>@if($plant->notes)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                        </svg>
                                    @endif</td>
                                <td>{{$plant->status}}</td>
                                <td>{{$plant->lastWatering}}</td>
                                <td>{{$plant->created_at}}</td>
                                <td>{{$plant->updated_at}}</td>
                                <td>
                                    <a href="{{route('admin.edit.plant',['plant'=>$plant->id])}}"><button type="button" class="btn btn-primary btn-sm">изменить</button></a>
                                </td>
                                <td>
                                    <button wire:click="delete({{$plant->id}})" wire:confirm="Вы точно хотите удалить {{$plant->name}} #ID: {{$plant->id}}?" type="button" class="btn btn-danger btn-sm">Удалить</button>
                                </td>
                            </tr>
                        @endforeach
                        @endif

                        @foreach($plants as $plant)
                        <tr wire:key="{{$plant->id}}">
                            <td>{{$plant->id}}</td>
                            <td>{{$plant->name}}</td>
                            <td>
                                <img src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($plant->image)}}" alt="plant" width="50px" height="50px">
                            </td>
                            <td>{{$plant->user->email}}</td>
                            <td>{{$plant->waterSummer}}</td>
                            <td>{{$plant->waterWinter}}</td>
                            <td>{{$plant->lightSummer}}</td>
                            <td>{{$plant->lightWinter}}</td>
                            <td>{{$plant->light}}</td>
                            <td>{{$plant->wet}}</td>
                            <td>@if($plant->notes)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                    </svg>
                                @endif</td>
                            <td>{{$plant->status}}</td>
                            <td>{{$plant->lastWatering}}</td>
                            <td>{{$plant->created_at}}</td>
                            <td>{{$plant->updated_at}}</td>
                            <td>
                                <a href="{{route('admin.edit.plant',['plant'=>$plant->id])}}"><button type="button" class="btn btn-primary btn-sm">изменить</button></a>
                            </td>
                            <td>
                                <button wire:click="delete({{$plant->id}})" wire:confirm="Вы точно хотите удалить {{$plant->name}} #ID: {{$plant->id}}?" type="button" class="btn btn-danger btn-sm">Удалить</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $plants->links() }}
</div>
