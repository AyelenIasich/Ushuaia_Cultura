<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- Personal Css --}}
        <link rel="stylesheet" href="{{ asset('/css/galeria.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        {{-- Material Icons --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
      {{-- Font Awesome --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script type="text/javascript" language="Javascript">
        document.oncontextmenu = function() {
            return false;
        };
    </script>
</head>

<body>
    <div id="app">
        @include('components.navbar')
        <main class="pt-5 mt-5 py-4">
            @include('components.theme-button')
            @yield('content')
        </main>
    </div>

</body>

</html>
    <script src="{{ URL::asset('js/theme.js') }}"></script>
