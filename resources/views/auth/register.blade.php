@extends('layouts.main')

@section('content')
    <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
    <div class="wrapper">
        <form class="form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="name form-item">
                <label for="name">Имя</label>
                <input class="form-input" type="text" name="name" id="name" value="{{old('name')}}">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="email form-item">
                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" id="email" value="{{old('email')}}">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="password form-item">
                <div class="password-item">
                    <label for="password">Пароль</label>
                    <svg id="show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </div>
                <input class="form-input" type="password" name="password" id="password" value="{{old('password')}}">
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="bottom-wrapper">
                <div class="image form-item">
                    <label class="button" for="image">Выбрать Фото</label>
                    <input class="form-input-image" title="не обязательно" type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" value="не обязательно">
                    @error('image')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <img class="img-prev" id="img" src="{{Storage::disk('public')->url('users/default.png')}}"/>
                <button class="button" type="submit">Зарегистрироваться</button>
            </div>
        </form>
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

        document.getElementById('image').addEventListener('change', event => {
            document.getElementById('img').src=URL.createObjectURL(event.target.files[0]);
        })
    </script>
@endsection
