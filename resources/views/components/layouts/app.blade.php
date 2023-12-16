<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        {{--styles--}}
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        {{--scripts--}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('alert',(event)=>{
                let data=event.detail
                const Toast = Swal.mixin({
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: data.icon,
                    title: data.title,
                    position: data.position,
                });
            })
        </script>
    </head>
    <body>
        <livewire:components.header></livewire:components.header>
            <main class="main" id="main">
                    {{ $slot }}
            </main>
        <livewire:components.footer></livewire:components.footer>
    </body>
</html>
