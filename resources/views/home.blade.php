<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- link swipper's css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    {{-- Personal link css --}}
    {{-- <link rel="stylesheet" href="{{ asset('/css/galeria.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    {{-- Material Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    {{-- Fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,900;1,300;1,700&display=swap"
        rel="stylesheet" />
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Ushuaia Cultura</title>
</head>

<body>
    @include('components.navbar')
    <div class="container-fluid p-0">
        @include('components.theme-button')
        @include('components.mainCarousel')

    </div>
    @if (isset(Auth::user()->name))
    <div class="container mt-5 pt-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bienvenida') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            {{ __('Bienvenido ' . Auth::user()->name . '. Espero que tengas una buena experiencia en nuestro sitio.') }}


                    </div>
                </div>
            </div>
        </div>
</div>
@endif
        @include('components.anotherCarousel')
        @include('components.eventosList')
        @include('components.footer')


        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


        <script src="{{ URL::asset('js/theme.js') }}"></script>



        <script type="text/javascript" language="Javascript">
            document.oncontextmenu = function() {
                return false
            }
        </script>
        <script src="{{ URL::asset('js/swiper.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>

</html>
