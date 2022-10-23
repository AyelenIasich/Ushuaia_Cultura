{{-- Formulario de creacion de artistas --}}
@include('navbar')
<div  class="container  pt-3">
    <div class="row pt-4 pb-5 ">
        <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
            <form action="{{ url('/artista') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- con esto imprimos una llave de seguridad, laravel nos responde cuando le enviamos la info al metodo store --}}
                @include('artista.form')

                <div class="row justify-content-center align-items-center mb-3 pt-2">
                    <div class="col-6">
                        <a href="#" class="btn btn-outline-volver c">
                            <i class="fa-solid fa-angle-left"></i> Volver</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-guardar " type="submit">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>
