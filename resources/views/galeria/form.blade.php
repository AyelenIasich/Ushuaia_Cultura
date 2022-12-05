<div class="box box-info padding-1 font">
    <div class="box-body">
        <div class="form-group mb-3 requerido">
            <label for="artista_id" class="form-label mb-2 pt-2">Artista Id</label>
            {{ Form::select('artista_id', $artista, $galeria->artista_id, ['class' => 'form-control' . ($errors->has('artista_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Artista']) }}
            {!! $errors->first('artista_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group  requerido ">
            <label for="image_obra" class="form-label mb-2 pt-2">Obra</label>
            <input type="file" class="form-control " name="image_obra" id="image_obra">
            @error('image_obra')
            <small class="error">*{{ $message }}</small>
        @enderror
        </div>

        @if (isset($galeria->image_obra))
        <div class="row">
            <div class="col mt-3">
                <p>
                    Nombre de obra anterior: {{ $galeria->image_obra }}
                </p>
            </div>
        </div>
        @endif
        @if (isset($galeria))
        <div class="row">
            <div class="col mb-3">
                <img src="{{ asset('obras') . '/' . $galeria->image_obra }}" style="width:9em" alt="">
            </div>
        </div>
        @endif

        <div class="form-group  mb-3 requerido">
            <label for="titulo_obra" class="form-label mb-2  pt-2">Título</label>
            {{ Form::text('titulo_obra', $galeria->titulo_obra, ['class' => 'form-control' . ($errors->has('titulo_obra') ? ' is-invalid' : ''), 'placeholder' => 'Titulo Obra']) }}
            {!! $errors->first('titulo_obra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <label for="descripcion_obra" class="form-label mb-2  pt-2">Descripción</label>
                    <textarea placeholder="Escribe aquí la descripción..." type="text" class="form-control" name="descripcion_obra"
                        id="descripcion_obra" cols="30" rows="4">@if (isset($galeria)){{ $galeria->descripcion_obra }}@endif @if (!$errors->has('descripcion_obra')){{ old('descripcion_obra') }}@endif</textarea>
                        @error('descripcion_obra')
                        <small class="error">*{{ $message }}</small>
                    @enderror
                      </div>
            </div>
        </div>

        <div class="form-group  mb-3">
            <label for="fecha_creacion" class="form-label mb-2  pt-2">Fecha de creación</label>
            {{ Form::date('fecha_creacion', $galeria->fecha_creacion, ['class' => 'form-control' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="row justify-content-center align-items-center mb-3 pt-2">
        <div class="col-6">
            <a href="{{ url()->previous() }}" class="btn btn-outline-volver ">
                <i class="fa-solid fa-angle-left"></i> Volver</a>
        </div>
        <div class="col-6">
            <button type="submit" class="btn  btn-guardar">Guardar</button>
        </div>
    </div>

    </div>

</div>

