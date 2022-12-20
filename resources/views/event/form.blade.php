<div class="row mt-1">
    <div class="col">
        <div class="form-group mb-3 requerido">
            <label for="categoria_id" class="form-label mb-2 pt-2">Seleccionar categoría del evento</label>
            {{ Form::select('categoria_id', $categories, $event->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Categoría']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="titulo_evento" class="form-label mb-2  pt-2">Título</label>
            <input type="text" value="{{ isset($event->titulo_evento) ? $event->titulo_evento : old('titulo_evento') }}"
                name="titulo_evento" id="titulo_evento" placeholder="Escribe aquí el título"
                @if (!empty($errors->get('titulo_evento'))) class="form-control is-invalid"@else class="form-control" @endif>
        </div>
        @error('titulo_evento')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="row mt-1">
    <div class="col col-12 col-sm-6 ">
        <div class="form-group mb-3 requerido">
            {{ Form::label('hora_evento') }}
            {{ Form::time('hora_evento', $event->hora_evento, ['class' => 'form-control' . ($errors->has('hora_evento') ? ' is-invalid' : ''), 'placeholder' => 'Hora Evento']) }}
            {!! $errors->first('hora_evento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col col-12 col-sm-6">
        <div class="form-group mb-3 requerido">
            {{ Form::label('fecha_evento') }}
            {{ Form::date('fecha_evento', $event->fecha_evento, ['class' => 'form-control' . ($errors->has('fecha_evento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Evento']) }}
            {!! $errors->first('fecha_evento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="resumen" class="form-label mb-2  pt-2">Resumen</label>
            <input type="text"  value="{{ isset($event->resumen) ? $event->resumen : old('resumen') }}"  name="resumen"
                id="resumen" placeholder="Escribe aquí una breve descripción del evento"
                @if (!empty($errors->get('resumen'))) class="form-control is-invalid"@else class="form-control" @endif>
        </div>
        @error('resumen')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="descripcion_evento" class="form-label mb-2  pt-2">Descripción</label>
            <textarea placeholder="Escribe aquí la descripción del evento" type="text" class="form-control"
                name="descripcion_evento" id="descripcion_evento" cols="30" rows="4">
@if (isset($event))
{{ $event->descripcion_evento }}
@endif @if (!$errors->has('descripcion_evento'))
{{ old('descripcion_evento') }}
@endif
</textarea>
            @error('descripcion_evento')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group  requerido ">
            <label for="image_evento" class="form-label mb-2 pt-2">Imagen del evento</label>
            <input accept="image/*" type="file" class="form-control " name="image_evento" id="image_evento">
            @error('image_evento')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>


@if (isset($event))
    <div class="row">
        <div class="col mb-3">
            <img src="{{ $event->image_evento }}" style="width:9em" alt="">
        </div>
    </div>
@endif

<div class="col">
    <div class="form-group">
        <label for="info_external" class="form-label mb-2  pt-2">Información externa sobre el evento</label>
        <input type="text"  value="{{ isset($event->info_external) ? $event->info_external : old('info_external') }}"
            name="info_external" id="info_external" placeholder="Para más información sobre el encuentro visite: "
            @if (!empty($errors->get('info_external'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('info_external')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>
<div class="col">
    <div class="form-group mb-3">
        <label for="nombre_url" class="form-label mb-2  pt-2">Nombre alternativo para la url externa</label>
        <input type="text"  value="{{ isset($event->nombre_url) ? $event->nombre_url : old('nombre_url') }}"
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
        <input type="url"  value="{{ isset($event->external_url) ? $event->external_url : old('external_url') }}"
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
        <input type="text"  value="{{ isset($event->direccion) ? $event->direccion : old('direccion') }}"
            name="direccion" id="direccion" placeholder="Av. San Martin 1052"
            @if (!empty($errors->get('direccion'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('direccion')
        <small class="error">*{{ $message }}</small>
    @enderror
</div>
<div class="col">
    <div class="form-group mb-3">
        <label for="institucion" class="form-label mb-2  pt-2">Institución donde se realiza el evento</label>
        <input type="text" value="{{ isset($event->institucion) ? $event->institucion : old('institucion') }}"
            name="institucion" id="institucion" placeholder="Museo Marítimo"
            @if (!empty($errors->get('institucion'))) class="form-control is-invalid"@else class="form-control" @endif>
    </div>
    @error('institucion')
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
        @if (isset($event->artists))
            <div class="row">
                <div class="col mt-3">
                    <p>
                        Artistas seleccionados:

                        @foreach ($event->artists as $artist)
                            <span class="artistas-nombres">
                                {{ $artist->nombre }} {{ $artist->apellido }}
                            </span>
                        @endforeach
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="row mt-3">
    <div class="col ">
        <p><span class="error">*</span> Campos requeridos</p>
    </div>
</div>
<div class="row justify-content-center align-items-center mb-3 pt-2">
    <div class="col-6">
        @hasrole('creadorEvento')

        <a href="/events/misEventos" class="btn btn-outline-volver ">
            <i class="fa-solid fa-angle-left"></i> Volver</a>
            @endhasrole
            @hasrole('admin')

            <a href="/#eventos" class="btn btn-outline-volver ">
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
