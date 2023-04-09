@extends('componentsHome')

@section('template_title')
    Totalidad de todos los eventos
@endsection

@section('content')
    <section id="allEvents">
        <div class="container mt-md-5 pt-md-5 pt-5 mb-5 pb-5">
            <div class="text-center pt-5 pt-md-0 mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Totalidad de Eventos</h1>
                <h2 class="section-title-02 text-center display-6">Totalidad de Eventos</h2>
            </div>
            <div class="row">
                <div class="col text-end pb-3">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenuEvento"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           Categorías
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuEvento">
                            @foreach ($CategoriasEvento as $categoria)
                            <li><a class="dropdown-item" href="{{route('evento.categoria', $categoria)}}" >{{$categoria->nombre}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            @include('components.cards-evento')

            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $events->links() !!}
                </ul>
            </nav>
        </div>
    </section>
@endsection
