<div>
    <link href="{{ asset('css/auth/forgotPassword.css') }}" rel="stylesheet">
    <div class="wrapper">
        <div class="messages">
            @if (session('status'))
                <span class="error">{{ session('status') }}</span>
            @endif
            @foreach ($errors->all() as $error)
                <span class="error">{{ $error }}</span>
            @endforeach
        </div>
        <form  wire:submit="send" class="form" method="post">
            @csrf
            <div class="email form-item">
                <label for="email">Email</label>
                <input wire:model="email" class="form-input" type="email" name="email" id="email">
            </div>
            <button class="button" type="submit">Отправить</button>
        </form>
        <img src="{{asset('images/auth/forgot-password-plants.svg')}}" alt="" class="forgot-password-plants">
    </div>
</div>
