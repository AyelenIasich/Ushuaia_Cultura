<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light navbar-bg-light shadow fs-5 ">
        <div class="container-xl">
            <a class="navbar-brand" href="#">
                <span class="ushuaia d-inline-block">USHUAIA</span>
                <span class="cultura d-inline-block">Cultura</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#main') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#artistas') }}">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#eventos') }}">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Contacto</a>
                    </li>
                </ul>
                @guest
                    @if (Route::has('login'))
                        <a class=" nav-link  pe-md-3 nav-item" href="{{ route('login') }}">Ingresar</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-item btn btn-success px-2 fs-6 mt-4 mt-md-0 mb-3 mb-md-0"
                            href="{{ route('register') }}">
                            Registrarse
                        </a>
                    @endif
                @else
                    <li class="nav-item dropdown text-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
</header>
