<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plants</title>

    {{--fonts--}}

    {{--styles--}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    {{--scripts--}}

</head>

<body>
    <x-header></x-header>
    <main>
        @yield('content')
    </main>
    <x-footer></x-footer>
</body>
</html>
