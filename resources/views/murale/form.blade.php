<div class="row mt-1">
    <div class="col">
        <div class="form-group mb-3 requerido">
            {{ Form::label('categoria_murales_id') }}
            {{ Form::select('categoria_murales_id', $categories, $murale->categoria_murales_id, ['class' => 'form-control' . ($errors->has('categoria_murales_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Categoría']) }}
            {!! $errors->first('categoria_murales_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group  mb-3 requerido">
            <label for="titulo_mural" class="form-label mb-2  pt-2">Título</label>
            <input type="text" value="{{ isset($murale->titulo_mural) ? $murale->titulo_mural : old('titulo_mural') }}"
                name="titulo_mural" id="titulo_mural" placeholder="Escribe aquí el título"
                @if (!empty($errors->get('titulo_mural'))) class="form-control is-invalid"@else class="form-control" @endif>
        </div>
        @error('titulo_mural')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group  mb-3 ">
            <label for="descripcion_mural" class="form-label mb-2  pt-2">Descripción</label>
            <textarea placeholder="Escribe aquí la descripción del mural" type="text" class="form-control"
                name="descripcion_mural" id="descripcion_mural" cols="30" rows="4">@if (isset($murale)){{ $murale->descripcion_mural }}@endif @if (!$errors->has('descripcion_mural')){{ old('descripcion_mural') }}@endif</textarea>
            @error('descripcion_mural')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group  requerido ">
            <label for="image_mural" class="form-label mb-2 pt-2">Imagen del mural</label>
            <input accept="image/*" type="file" class="form-control " name="image_mural" id="image_mural">
            @error('image_mural')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

        @if (isset($murale))
            <div class="row justify-content-center align-items-center">
                <div class="col mb-3 mt-3 ">
                    <img src="{{ $murale->image_mural }}" style="width:9em" alt="">
                </div>
            </div>
        @endif


<div class="col">
    <div class="form-group  mb-3">
        <label for="info_externa" class="form-label mb-2  pt-2">Información externa sobre el evento</label>
        <input type="text" value="{{ isset($murale->info_externa) ? $murale->info_externa : old('info_externa') }}"
            name="info_externa" id="info_externa" placeholder="Para más información sobre el encuentro visite: "
            @if (!empty($errors->get('info_externa'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('info_externa')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>

<div class="col">
    <div class="form-group mb-3">
        <label for="nombre_url" class="form-label mb-2  pt-2">Nombre alternativo para la url externa</label>
        <input type="text" value="{{ isset($murale->nombre_url) ? $murale->nombre_url : old('nombre_url') }}"
            name="nombre_url" id="nombre_url"
            placeholder="Si la url es muy compleja escriba una nombre alternativo para la url externa."
            @if (!empty($errors->get('nombre_url'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('nombre_url')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>

<div class="col">
    <div class="form-group mb-3">
        <label for="external_url" class="form-label mb-2  pt-2">URL externa</label>
        <input type="url" value="{{ isset($murale->external_url) ? $murale->external_url : old('external_url') }}"
            name="external_url" id="external_url" placeholder="www.google.com/fduw1j"
            @if (!empty($errors->get('external_url'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('external_url')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>


<div class="col">
    <div class="form-group requerido mb-3">
        <label for="direccion" class="form-label mb-2  pt-2">Dirección</label>
        <input type="text" value="{{ isset($murale->direccion) ? $murale->direccion : old('direccion') }}"
            name="direccion" id="direccion" placeholder="Av. San Martin 1052"
            @if (!empty($errors->get('direccion'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('direccion')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>
<div class="row">
    <div class="col ">
        <div class="form-group mb-3 container-select">
            <label for="artists">Artistas</label>
            <select class="form-control select2 " name="artists[]" multiple>
                @foreach ($artists as $id => $artists)
                    <option value="{{ $id }}">{{ $artists }} </option>
                @endforeach
            </select>
            @if ($errors->has('artists'))
                <span class="text-danger">
                    <strong>{{ $errors->first('artists') }}</strong>
                </span>
            @endif

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        @if (isset($murale->artists))
            <div class="row">
                <div class="col mt-3">
                    <p>
                        Artistas seleccionados:

                        @foreach ($murale->artists as $artist)
                            <span class="artistas-nombres">
                                {{ $artist->nombre }}
                            </span>
                        @endforeach
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>


<div class="row justify-content-center align-items-center mb-3 pt-2">
    <div class="col-6">
        @hasrole('creadorEvento')
            <a href="/events/misEventos" class="btn btn-outline-volver ">
                <i class="fa-solid fa-angle-left"></i> Volver</a>
        @endhasrole
        @hasrole('admin')
            <a href="/#murales" class="btn btn-outline-volver ">
                <i class="fa-solid fa-angle-left"></i> Volver</a>
        @endhasrole
    </div>
    <div class="col-6">
        <button class="btn btn-guardar  " type="submit">Guardar</button>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
        })
    </script>
@endsection
