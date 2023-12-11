<div>
    <link href="{{ asset('css/auth/forgotPassword.css') }}" rel="stylesheet">
    <div class="wrapper">
        <form  wire:submit="send" class="form" method="post">
            @csrf
            @if (session('status'))
                <span class="status">{{ session('status') }}</span>
            @endif
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
            <div class="email form-item">
                <label for="email">Email</label>
                <input wire:model="email" class="form-input" type="email" name="email" id="email">
            </div>
            <button class="button" type="submit">Отправить</button>
        </form>
    </div>
</div>
