@extends('theme.base')

@section('tablaArtistas')


    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Instagram</th>
                <th>Facebook</th>
                <th>Correo</th>
                <th>Descripcion</th>
                <th>Subtitulo</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr>
                    <td>{{ $artista->id }}</td>
                    <td>{{ $artista->Foto }}</td>
                    <td>{{ $artista->Nombre }}</td>
                    <td>{{ $artista->Apellido }}</td>
                    <td>{{ $artista->Instagram }}</td>
                    <td>{{ $artista->Facebook }}</td>
                    <td>{{ $artista->Correo }}</td>
                    <td>{{ $artista->Descripcion }}</td>
                    <td>{{ $artista->Subtitulo}}</td>
                    <td>
                        <a href="{{ url('/artista/' . $artista->id . '/edit') }}">Editar</a>
                        |


                        <form action="{{ url('/artista/' . $artista->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Quieres Borrar?')">Borrar</button>
                        </form>

                    </td>

                </tr>
            @endforeach


        </tbody>



    </table>
@endsection
