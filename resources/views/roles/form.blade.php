<div class="row">
    <div class="col pb-3">
        <div class="form-group requerido">
            <label for="name" class="form-label mb-2  pt-2">Nombre</label>
            <input type="text" value="{{ isset($role->name) ? $role->name : old('name') }}" class="form-control"
                name="name" id="name" placeholder="creadorEventos">
        </div>
        @error('name')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>
@foreach ($permissions as $permission)
    <div >
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1' ] ) !!}
            {{ $permission->description }}
        </label>

    </div>
@endforeach
<div class="row justify-content-center align-items-center mt-4  pt-2">
    <div class="col-6">
        <a href="/roles" class="btn btn-outline-volver ">
            <i class="fa-solid fa-angle-left"></i> Volver</a>
    </div>
    <div class="col-6">
        <button class="btn btn-guardar  " type="submit">Guardar</button>
    </div>
</div>
