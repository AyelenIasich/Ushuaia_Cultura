<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/io.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,900;1,300;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Ushuaia Cultura</title>
</head>

<body class="dark">

    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-light navbar-bg-light shadow fs-5 ">
            <div class="container-xl">
                <a class="navbar-brand" href="#">
                    <span class="ushuaia d-inline-block">USHUAIA</span>
                    <span class="cultura d-inline-block">Cultura</span>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Artistas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contacto</a>
                        </li>

                    </ul>
                    <a href="#" class="nav-link pe-3 nav-item">Ingresar</a>
                    <button type="button" style="cursor: pointer"
                        class=" nav-item btn btn-success px-2 fs-6 mt-4 mt-md-0">Registrarse
                    </button>


                </div>

            </div>
        </nav>
    </header>




    <main id="main" >
        <div id="carousel" class="carousel slide " data-bs-ride="carousel" data-pause='false'>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/images/home1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="src/images/home1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="src/images/home1.png" class="d-block w-100" alt="...">
                </div>
                <div class="overlay">
                    <div class="container">
                        <div class="row content align-items-end">
                            <div class="col col-md-6">
                                <h1>Ushuaia, la ciudad del arte</h1>
                                <p>Descubre asombrosos murales dispersos por la ciudad. <br>
                                    Registrate para mantenerte al tanto de eventos, y conoce <br>a los principales
                                    artistas
                                    de Ushuaia.</p>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn-success btn" type="button">Quiero ser parte</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row row-scroll-down align-items-center">
                            <div class="col text-center">
                                <a href="#artistas" class="scroll-down">Scroll Down<i
                                        class="fa-solid fa-arrow-down ps-3"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </main>

    <div id="artistas" class="container my-5">
        <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis quam minima perspiciatis eos tenetur.
            Praesentium dolores at quos aperiam sed, sint provident consectetur incidunt, nostrum porro earum commodi,
            ex architecto.</p>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
