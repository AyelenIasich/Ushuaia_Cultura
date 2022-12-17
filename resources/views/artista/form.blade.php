<div class="row mt-1">

    <div class="col ">

        {{-- @hasrole('artista')
            {!! Form::hidden('nombre', $artistaUser->nombre) !!}
        @else --}}
            <div class="form-group mb-3 requerido">
                <label for="nombre" class="form-label mb-2 pt-2">Nombre y Apellido</label>
                <input placeholder="Georgina Torres" type="text"
                    value="{{ isset($artista->nombre) ? $artista->nombre : old('nombre') }}" name="nombre" id="nombre"
                    @if (!empty($errors->get('nombre'))) class="form-control is-invalid"@else class="form-control" @endif>
                @error('nombre')
                    <small class="error">*{{ $message }}</small>
                @enderror
            </div>
    {{-- @endhasrole --}}
        </div>


</div>
<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="cover_carousel " class="form-label mb-2 pt-2">Imagen del carousel</label>
            <input type="file" class="form-control " name="cover_carousel" id="cover_carousel"   value="{{ isset($artista->cover_carousel) ? $artista->cover_carousel : old('cover_carousel') }}"
                @if (!empty($errors->get('cover_carousel'))) class="form-control is-invalid"@else class="form-control" @endif>
            @error('cover_carousel')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="descripcion" class="form-label mb-2  pt-2">Descripción</label>
            <textarea placeholder="Escribe aquí la descripción..." type="text" class="form-control" name="descripcion"
                id="descripcion" cols="30" rows="4">@if (isset($artista)){{ $artista->descripcion }}@endif @if (!$errors->has('descripcion')){{ old('descripcion') }}@endif</textarea>
            @error('descripcion')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="correo" class="form-group mb-2  pt-2">Correo</label>
            <input placeholder="example@gmail.com" type="email"
                value="{{ isset($artista->correo) ? $artista->correo : old('correo') }}"
                @if (!empty($errors->get('correo'))) class="form-control is-invalid"@else class="form-control" @endif
                name="correo" id="correo">
            @error('correo')
                <small class="error">*{{ $message }}</small>
            @enderror

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="instagram" class="form-label mb-2  pt-2">Instagram</label>
            <input placeholder="https://www.instagram.com/iasichjorge/" type="url"
            value="{{ isset($artista->instagram) ? $artista->instagram : old('instagram') }}" class="form-control"
                name="instagram" id="instagram">
            @error('instagram')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="facebook" class="form-label mb-2  pt-2">Facebook</label>
            <input type="url"    value="{{ isset($artista->facebook) ? $artista->facebook : old('facebook') }}"
                class="form-control" name="facebook" id="facebook"
                placeholder="https://www.facebook.com/profile.php?id=100009045762516">
            @error('facebook')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>


    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="titulo" class="form-label mb-2  pt-2">Título</label>
            <input type="text"  value="{{ isset($artista->titulo) ? $artista->titulo : old('titulo') }}"
                class="form-control" name="titulo" id="titulo" placeholder="Escribe aquí el título">
        </div>
        @error('titulo')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">

            <label for="subtitulo" class="form-label mb-2  pt-2">Subtítulo</label>
            <input type="text" value="{{ isset($artista->subtitulo) ? $artista->subtitulo : old('subtitulo') }}"
                class="form-control" name="subtitulo" id="subtitulo" placeholder="Escribe aquí el subtítulo">
            @error('subtitulo')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group mb-3 requerido">
            <label for="images " class="form-label mb-2 pt-2">Imágenes personales del artista</label>
            <input type="file" name="images[]" multiple id="Foto"
                @if (!empty($errors->get('images'))) class="form-control is-invalid"@else class="form-control" @endif>
            @error('images')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>
<div class="row mt-3">
    <div class="col ">
        <p><span class="error">*</span> Campos requeridos</p>
    </div>
</div>
<div class="row justify-content-end align-items-end mb-3 pt-2">
 {{--   <div class="col-6">

@hasrole('artista')
<a href="/artistas" class="btn btn-outline-volver ">
    <i class="fa-solid fa-angle-left"></i> Volver</a>
@else
        <a href="/#artistas" class="btn btn-outline-volver ">
            <i class="fa-solid fa-angle-left"></i> Volver</a>
            @endhasrole
    </div> --}}
    <div class="col-6">
        <button class="btn btn-guardar  " type="submit">Guardar</button>
    </div>
</div>
