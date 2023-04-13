<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light navbar-bg-light shadow fs-5 "id="navbar-example2">
        <div class="container-xl">
            <a class="navbar-brand" href="#">
                <span class="ushuaia d-inline-block">USHUAIA</span>
                <span class="cultura d-inline-block">Cultura</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse text-center navbar-collapse  navbar-nav-scroll" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto  mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#main') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#artistas') }}">Artistas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#murales') }}">Murales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . '#mapa') }}">Mapa</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="{{ url('/' . '#eventos') }}">Eventos</a>                       
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Contacto</a>
                    </li> --}}
                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0 ">
                    @guest

                        @if (Route::has('login'))
                            <li class="nav-item ">
                                {{-- <a class="   pe-md-3 nav-link" href="{{ route('login') }}">Ingresar</a> --}}
                                <a class="   pe-md-3 nav-link" href="{{ secure_url('/login') }}">Ingresar</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item" id="registracion-enlace">
                                {{-- <a class=" btn btn-success fs-6 pb-2  " href="{{ route('register') }}">
                                    Registrarse
                                </a> --}}
                                <a class=" btn btn-success fs-6 pb-2  " href="{{ secure_url('/register') }}">
                                    Registrarse
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <div class="dropdown-center">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                    @role('admin')
                                        <a class="dropdown-item" href="{{ route('users.index') }}"><i
                                                class="fa-solid fa-users"></i>
                                            {{ __('  Usuarios') }} </a>

                                        <a class="dropdown-item" href="{{ route('roles.index') }}"><i
                                                class="fa-sharp fa-solid fa-genderless"></i>
                                            {{ __('   Roles') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('events.index') }}"><i
                                                class="fa-solid fa-calendar-day"></i>
                                            {{ __('   Eventos') }}
                                        </a>
                                    @endrole

                                    @can('categories.index')
                                        <a class="dropdown-item" href="{{ route('categories.index') }}"><i
                                                class="fa-solid fa-shapes"></i>
                                            {{ __('   Categorias Eventos') }}
                                        </a>
                                    @endcan
                                    @can('categories-murales.index')
                                    <a class="dropdown-item" href="{{ route('categories-murales.index') }}"><i
                                            class="fa-solid fa-shapes"></i>
                                        {{ __('   Categorias Murales') }}
                                    </a>
                                @endcan
                                    @can('artists.index')
                                        <a class="dropdown-item" href="{{ route('artists.index') }}"><i
                                                class="fa-solid fa-list"></i>
                                            {{ __('  Lista Artistas') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endcan

                                    @hasrole('artista')
                                        <a class="dropdown-item" href="{{ route('artistas.index') }}"><i
                                                class="fa-solid fa-user"></i>
                                            {{ __('   Mi perfil artista') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endhasrole
                                    @hasrole('creadorEvento')
                                        <a class="dropdown-item" href="{{ route('events.misEventos') }}"><i
                                                class="fa-solid fa-calendar-day"></i>
                                            {{ __('  Edición eventos') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endhasrole
                                    @hasrole('creadorMurales')
                                    <a class="dropdown-item" href="{{ route('murales.index') }}"><i
                                            class="fa-solid fa-calendar-day"></i>
                                        {{ __('  Edición murales') }}
                                    </a>
                                    <hr class="dropdown-divider">
                                @endhasrole
                                    <a class="dropdown-item" href="{{ route('user.wishlist') }}"><i
                                            class="fa-solid fa-heart"></i>
                                        {{ __('  Mi Galeria') }}
                                    </a>
                                    <a class="dropdown-item " href="{{ route('user.wishlistevent') }}"><i
                                            class="fa-solid fa-heart"></i>
                                        {{ __('  Mis Eventos') }}
                                    </a>
                                    <a class="dropdown-item " href="{{ route('user.wishlistmural') }}"><i
                                        class="fa-solid fa-heart"></i>
                                    {{ __('  Mis Murales') }}
                                </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    {{-- LOCAL --}}
                                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
                                    {{-- NUBE --}}
                                    <form id="logout-form" action="{{  secure_url('/logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </li>
                    @endguest
                </ul>


            </div>
        </div>
    </nav>

</header>
