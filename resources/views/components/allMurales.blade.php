@extends('componentsHome')

@section('template_title')
    Totalidad de murales
@endsection
@section('content')
    <section id="murales">
        <div class="container mt-md-5 pt-md-5 mb-5 pt-5  pb-5">
            <div class="text-center mt-5 mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Totalidad de murales</h1>
                <h2 class="section-title-02 text-center display-6">Totalidad de murales</h2>
            </div>
            <div class="row">
                <div class="col text-end pb-3">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenuMural"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           Categorías
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuMural">
                            @foreach ($CategoriasMural as $categoria)
                            <li><a class="dropdown-item" href="{{route('mural.categoria', $categoria)}}" >{{$categoria->nombre}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            {{-- @include('components.cardMural') --}}
            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $murales->links() !!}
                </ul>
            </nav>

        </div>
    </section>
@endsection
