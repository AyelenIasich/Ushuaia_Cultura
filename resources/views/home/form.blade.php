<div>
    <div class="col ">
        <div class="form-group  requerido">
            <label for="titulo" class="form-label mb-2 pt-2 ">Título</label>
            <input placeholder="titulo" value="{{ isset($homes->titulo) ? $homes->titulo : old('titulo') }}" type="text"
                name="titulo" id="titulo"
                @if (!empty($errors->get('titulo'))) class="form-control is-invalid"@else class="form-control" @endif>
            @error('titulo')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="form-group  requerido">
                <label for="descripcion" class="form-label mb-2  pt-2">Descripción</label>
                <textarea placeholder="descripcion" type="text" class="form-control" name="descripcion" id="descripcion"
                    cols="30" rows="6">
@if (isset($homes))
{{ $homes->descripcion }}
@endif @if (!$errors->has('descripcion'))
{{ old('descripcion') }}
@endif
</textarea>
                @error('descripcion')
                    <small class="error">*{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group requerido">
                <div class="form-group mb-3">
                    <label for="images " class="form-label mb-2 pt-2">Imágenes del carousel</label>
                    <input
                        @if (!empty($errors->get('images'))) class="form-control is-invalid" @else class="form-control" @endif
                        type="file" name="images[]" multiple id="Foto">
                </div>
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
    <div class="row justify-content-center align-items-center mb-3 pt-2">
        <div class="col-6">
            <a href="{{ url('/home/') }}" class="btn btn-outline-volver c">
                <i class="fa-solid fa-angle-left"></i> Volver</a>
        </div>
        <div class="col-6">
            <button class="btn btn-guardar " type="submit">Guardar</button>
        </div>
    </div>
</div>
