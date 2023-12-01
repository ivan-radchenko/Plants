<div>
    <link href="{{ asset('css/auth/profile.css') }}" rel="stylesheet">
    <div class="container">
        <div class="sub-container">
                 @if($image)
                    <img class="user-image" src="{{$image->temporaryUrl()}}" alt="user_image" id="user-image">
                 @else
                    <img class="user-image" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url(Auth::user()->image)}}" alt="user_image" id="user-image">
                 @endif
                <div class="form-item">
                    <label class="button" for="image">Выбрать Фото</label>
                    @if(session('success_update_image')) <span class="success">{{session('success_update_image')}}</span> @endif
                    <button wire:click="updateImage" class="button" type="submit">Сохранить</button>
                    <input wire:model="image" class="input-image" title="не обязательно" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
                    @error('image')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="sub-container">
                <div class="form-item">
                    <label for="name">Имя</label>
                    <input wire:model="name" class="form-input" type="text" name="name" id="name">
                    @if(session('success_update_name')) <span class="success">{{session('success_update_name')}}</span> @endif
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <button wire:click="updateName" class="button" type="button">Сохранить</button>
                </div>
        </div>
        <div class="sub-container">
                <div class="form-item">
                    <label for="email">Email</label>
                    <input wire:model="email" class="form-input" type="email" name="email" id="email">
                    @if(session('success_update_email')) <span class="success">{{session('success_update_email')}}</span> @endif
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <button wire:click="updateEmail" class="button" type="button">Сохранить</button>
                </div>
        </div>
        <div class="sub-container">
                <div class="form-item">
                    <div class="password-item">
                        <label for="password">Пароль</label>
                        <svg id="show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </div>
                    <input wire:model="password" autocomplete="new-password" class="form-input" type="password" name="password" id="password" placeholder="пароль">
                    @if(session('success_update_password')) <span class="success">{{session('success_update_password')}}</span> @endif
                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                    <button wire:click="updatePassword" class="button" type="button">Сохранить</button>
                </div>
        </div>
    </div>
    <script>
        document.getElementById('show').addEventListener('click', event => {
            const x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        })
    </script>
</div>
