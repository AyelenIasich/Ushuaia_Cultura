<div class="row">
    <div class="col">
        <div class="form-group requerido">
            <label for="nombre" class="form-label mb-2  pt-2">Nombre de categoría</label>
            <input type="text" value="{{ isset($category->nombre) ? $category->nombre : old('nombre') }}"
                class="form-control" name="nombre" id="nombre" placeholder="Exposición Artística">
        </div>
        @error('nombre')
            <small class="error">*{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col text-end">
        <p><span class="error">*</span> Campos requeridos</p>
    </div>
</div>
<div class="row justify-content-center align-items-center mb-3 pt-2">
    <div class="col-6">


        <a href="/categories" class="btn btn-outline-volver ">
            <i class="fa-solid fa-angle-left"></i> Volver</a>
    </div>
    <div class="col-6">
        <button class="btn btn-guardar  " type="submit">Guardar</button>
    </div>
</div>
