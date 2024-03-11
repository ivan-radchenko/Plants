<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{asset('images/logo.svg')}}" sizes="32x32" type="image/svg">
        <title>{{ $title ?? 'Page Title' }}</title>

        {{--styles--}}
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/alertCustom.css') }}" rel="stylesheet">
        {{--scripts--}}
        <script src="{{asset('js/sweetAlert2.js')}}"></script>
        <script src="{{asset('js/alertCustom.js')}}"></script>
    </head>
    <body>
        <livewire:components.header></livewire:components.header>
            <main class="main" id="main">
                    {{ $slot }}
            </main>
        <livewire:components.footer></livewire:components.footer>
    </body>
</html>
