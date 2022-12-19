    @if (!empty($home))
        <main id="main">
            <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause=“false”>
                <div class="carousel-inner">

                    @foreach ($home as $hom)
                        @if (isset($hom->home_images))
                            @foreach ($hom->home_images as $img)
                                {{-- <div class="carousel-item active">
                                <img src="{{ asset('carousel') . '/' . $img->image }}" class="d-block w-100"
                                    alt="...">
                            </div> --}}
                                <div class="carousel-item active">
                                    <img src="{{ asset($img->image) }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach

                            <div class="overlay">
                                <div class="container d-none d-lg-block">
                                    <div class="row content align-items-end ">
                                        <div class="col col-md-6 strong ">
                                            <h1><span>Ushuaia,</span> {{ $hom->titulo }}</h1>
                                            <p>{{ $hom->descripcion }}</p>
                                            <div class="row justify-content-start">
                                                <div
                                                    class="col col-md-5 col-lg-5 col-xl-4 col-xxl-3 text-start me-0 me-xxl-3 pe-0">
                                                    <a href="{{ route('register') }} "class="btn-success btn">Quiero ser parte</button> </a>
                                                </div>
                                                @role('admin')
                                                    <div class="col col-md-4  col-xxl-2  text-start ms-0 ps-0">
                                                        <a href="{{ url('/home/' . $hom->id . '/edit') }}"
                                                            class="btn btn-success"><i class="fa-solid fa-pen"></i>
                                                            Editar</a>
                                                    </div>
                                                @endrole
                                            </div>
                                        </div>
                                    </div>
                        @endif
                    @endforeach
                    <div class="row row-scroll-down align-items-center ">
                        <div class="col text-center">
                            <a href="#artistas" class="scroll-down">Scroll Down<i
                                    class="fa-solid fa-arrow-down ps-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>



            </div>
            <div class="container-fluid">
                <div class="row d-lg-none ">
                    <div class="col ms-3 me-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="content ">

                                    @foreach ($home as $hom)
                                        <h1 class=" card-title text-center"><span>Ushuaia,</span>{{ $hom->titulo }}
                                        </h1>
                                        <div class="mt-3 card-text descripcion text-center">
                                            <p>{{ $hom->descripcion }}</p>
                                        </div>
                                    @endforeach

                                    <div class="row botones">
                                        <div class="col-12 text-center mt-2"><a class="btn-success btn"
                                            href="{{ route('register') }}">Quiero ser parte</a>

                                        </div>
                                        @role('admin')
                                            <div class="col text-end  m-0 p-0 edit   ">
                                                <a href="{{ url('/home/' . $hom->id . '/edit') }}"
                                                    class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                                            </div>
                                        @endrole
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row row-scroll-down align-items-center">
                            <div class="col text-center pb-3">
                                <a href="#artistasC" class="scroll-down">Scroll Down<i
                                        class="fa-solid fa-arrow-down ps-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
