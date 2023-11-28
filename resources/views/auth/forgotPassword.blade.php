@extends('layouts.main')

@section('content')
    <link href="{{ asset('css/auth/forgotPassword.css') }}" rel="stylesheet">
    <div class="wrapper">
        <form class="form" action="{{ route('password.request') }}" method="post">
            @csrf
            @if (session('status'))
                <span class="status">{{ session('status') }}</span>
            @endif
            <div class="email form-item">
                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" id="email" value="{{old('email')}}">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button class="button" type="submit">Отправить</button>
        </form>
    </div>
@endsection

