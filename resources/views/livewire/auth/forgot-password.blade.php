<div>
    <link href="{{ asset('css/auth/forgotPassword.css') }}" rel="stylesheet">
    <div class="wrapper">
        <form  wire:submit="send" class="form">
            @csrf
            @if (session('status'))
                <span class="status">{{ session('status') }}</span>
            @endif
            <div class="email form-item">
                <label for="email">Email</label>
                <input wire:model="email" class="form-input" type="email" name="email" id="email">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button class="button" type="submit">Отправить</button>
        </form>
    </div>
</div>
