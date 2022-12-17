@if (isset(Auth::user()->name))
    <div class="container mt-5 pt-5">

        <div class="row justify-content-center" id="bienvenida">
            <div class="col-10 -md-8 ">
                <div class="card login-card">
                    <div class="card-body text-md-center p-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="nombre-usuario"> Hola, Bienvenid@ <span>{{ Auth::user()->name }}</span>! </p>
                        <p> Gracias por sumarte este proyecto. Espero que tengas una hermosa experiencia</p>
                        @role('artista')
                            <p>Veo que eres un artista, me gustaría ayudarte a la creación de tu perfil de artista.</p>
                            <p>Cuando estés listo presiona el siguiente boton:</p>
                            <div class="row  mb-3 justify-content-end ">
                                <div class="col  me-3">
                                    <a href="{{ route('artistas.index') }}" class="btn btn-success btn-lg "></i>Crear perfil</a>
                                </div>
                            </div>
                        @endrole
                        @role('creadorEvento')
                            <p>Veo que eres un creador de eventos, me gustaría ayudarte a la creación de primer
                                evento.</p>
                            <p>Cuando estés listo presiona el siguiente boton:</p>
                            <div class="row mb-3 justify-content-end ">
                                <div class="colme-3">
                                    <a href="{{ route('events.create') }}" class="btn btn-success   "><i
                                            class="fa-solid fa-plus"></i>
                                        Crear evento</a>
                                </div>

                            </div>
                        @endrole
                        @role('creadorMurales')
                            <p>Veo que eres un creador de murales, me gustaría ayudarte a la creación de primer
                                mural.</p>
                            <p>Cuando estés listo presiona el siguiente boton:</p>
                            <div class="row mb-3 justify-content-end ">
                                <div class="colme-3">
                                    <a href="{{ route('murales.index') }}" class="btn btn-success   "><i
                                            class="fa-solid fa-plus"></i>
                                        Crear mural</a>
                                </div>

                            </div>
                        @endrole

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
