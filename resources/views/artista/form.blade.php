{{-- Formulario que tendra datos en comun con create y edit --}}

@extends('theme.base')

@section('form')
    <div>
        <div class="row mt-1">
            <div class="col col-12 col-sm-6">
                <label for="Nombre" class="form-label mb-2 pt-2">Nombre</label>
                <input placeholder="Sergio" type="text" class="form-control" name="Nombre" id="Nombre">
            </div>
            <div class="col col-12 col-sm-6">
                <label for="Apellido" class="form-label mb-2  pt-2">Apellido</label>
                <input placeholder="Rodriguez" type="text" class="form-control" name="Apellido" id="Apellido">
            </div>
        </div>




        <label for="Instagram" class="form-label mb-2  pt-2">Instagram</label>
        <input placeholder="https://www.instagram.com/iasichjorge/" type="text" class="form-control" name="Instagram" id="Instagram">

        <label for="Facebook" class="form-label mb-2  pt-2">Facebook</label>
        <input type="text" class="form-control" name="Facebook" id="Facebook" placeholder="https://www.facebook.com/profile.php?id=100009045762516">

        <label for="Correo" class="form-group mb-2  pt-2">Correo</label>
        <input placeholder="example@gmail.com" type="email" class="form-control" name="Correo" id="Correo">

        <label for="Descripcion" class="form-label mb-2  pt-2">Descripción</label>
        <textarea placeholder="Mi trabajo me hace muy feliz..." type="text" class="form-control descripcionExp"
            name="Descripcion" id="Descripcion" cols="30" rows="4"></textarea>
            <label for="Subtitulo" class="form-label mb-2  pt-2">Subtitulo</label>
            <textarea placeholder="Soy un subtitulo" type="text" class="form-control descripcionExp"
                name="Subtitulo" id="Subtitulo" cols="30" rows="4"></textarea>

        <div class="form-group mb-3">
            <label for="Foto " class="form-label mb-2 pt-2">Foto</label>
            <input type="file" class="form-control " name="Foto" id="Foto">

        </div>


    </div>
@endsection
