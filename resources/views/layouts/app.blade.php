<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Ushuaia Cultura') }}</title> --}}
    <title>Ushuaia Cultura</title>
        {{-- Personal Css --}}
        <link rel="stylesheet" href="{{ asset('/css/galeria.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        {{-- External css --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('scripts')
     {{-- Alertas sweet --}}
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     @if (session('eliminar') == 'eliminado')
         <script src="{{ URL::asset('js/alerta-borrado.js') }}"></script>
     @endif
     <script src="{{ URL::asset('js/alerta-eliminacion.js') }}"></script>
     @if (session('actualizado') == 'ok')
         <script src="{{ URL::asset('js/alerta-actualizado.js') }}"></script>
     @endif
     @if (session('creado') == 'ok')
         <script src="{{ URL::asset('js/alerta-creado.js') }}"></script>
     @endif
</body>

</html>
    <script src="{{ URL::asset('js/theme.js') }}"></script>
