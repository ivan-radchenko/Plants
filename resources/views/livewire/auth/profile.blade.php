<div>
    <link href="{{ asset('css/auth/profile.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="sub-header">
                <img src="{{asset('images/header/left-subheader-image.svg')}}" alt="" class="left-subheader-image">
                <img src="{{asset('images/header/right-subheader-image.svg')}}" alt="" class="right-subheader-image">
            <div class="messages">
                @if (session('status'))
                    <span class="error">{{ session('status') }}</span>
                @endif
                @foreach ($errors->all() as $error)
                    <span class="error">{{ $error }}</span>
                @endforeach
            </div>
        </div>
        <form class="form" wire:submit="update">
            @csrf
            <div class="form-item">
                <label class="image-label" for="image">
                    @if($image)
                        <img class="user-image" src="{{$image->temporaryUrl()}}" alt="user_image" id="user-image">
                    @else
                        <img class="user-image" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->image)}}" alt="user_image" id="user-image">
                    @endif
                    <div class="image-button">Выбрать Фото</div>
                    <div class="image-animated"></div>
                </label>
                <input wire:model="image" class="input-image" title="не обязательно" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="form-item">
                <label for="name">Имя</label>
                <input wire:model="name" class="form-input" type="text" name="name" id="name">
            </div>
            <div class="form-item">
                <label for="email">Email</label>
                <input wire:model="email" class="form-input" type="email" name="email" id="email">
            </div>
            <div class="form-item">
                <div class="password-item">
                    <label for="password">Пароль</label>
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi-eye" id="show" width="25" height="25" viewBox="0 0 25.07 12.87">
                        <path d="m12.67,10.81c-2.63,0-4.77-2.04-4.77-4.55S10.04,1.7,12.67,1.7s4.77,2.04,4.77,4.56-2.14,4.55-4.77,4.55Zm0-8.11c-2.08,0-3.77,1.59-3.77,3.56s1.69,3.55,3.77,3.55,3.77-1.59,3.77-3.55-1.69-3.56-3.77-3.56Z"/>
                        <path d="m12.51,12.87c-.21,0-.41,0-.62-.01C5.05,12.55.47,7.45.28,7.23l-.28-.32.27-.33C.49,6.32,5.78,0,12.96,0c4.24,0,8.21,2.22,11.81,6.58l.3.36-.34.32c-3.9,3.72-8.01,5.6-12.23,5.6ZM1.34,6.89c1.11,1.11,5.15,4.73,10.61,4.96,4.03.18,7.98-1.51,11.76-4.99-3.32-3.89-6.93-5.86-10.73-5.86h0C7.17,1,2.52,5.6,1.34,6.89Z"/>
                    </svg>
                </div>
                <input wire:model="password" autocomplete="new-password" class="form-input" type="password" name="password" id="password" placeholder="пароль">
            </div>
            <button type="submit" class="button">Сохранить</button>
            @if(Auth::user()->is_admin === true)
                <button type="button" class="button">Админка</button>
            @else
                <button wire:confirm.prompt="Отменить это действие будет невозможно. Вы уверенны,что хотите удалить свой аккаунт? Если да, введите свое имя. |{{Auth::user()->name}}"
                        wire:click="delete" class="button" type="button">
                    Удалить аккаунт
                </button>
            @endif
        </form>
        </div>
    <script>
        document.getElementById('show').addEventListener('click', event => {
            const password = document.getElementById("password");
            const svg = document.getElementById("show");
            if (password.type === "password") {
                password.type = "text";
                svg.style.fill="#004445";
            } else {
                password.type = "password";
                svg.style.fill="#FFFFFF";
            }
        })
    </script>
</div>
