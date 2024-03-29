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
        <div style="padding: 0 50px">
            <h2>Отправка сообщения всем пользователям</h2>
           <form wire:submit="sendEmail" style="display: flex;flex-direction: column;">
               @csrf
               <div class="mb-3">
                   <label for="exampleFormControlTextarea1" class="form-label"></label>
                   <textarea wire:model="text" class="form-control" id="exampleFormControlTextarea1" rows="10" style="font-size: 25px"></textarea>
               </div>
               <button type="submit" class="btn btn-primary btn-sm">Отправить</button>
           </form>
        </div>
    </div>
</div>
