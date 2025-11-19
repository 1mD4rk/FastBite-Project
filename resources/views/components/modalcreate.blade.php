@props(['categorias' => []])

<style>

.aniadir {
    background-color: #B8001F;
    color: #FFFFFF;
    font-weight: bold;
}

.aniadir:hover {
    background-color: #e1193aff;
    color: #FFFFFF;
    font-weight: bold;
}

.aniadir:clicked {
    background-color: #9c0019ff;
    color: #FFFFFF;
    font-weight: bold;
}

</style>

<!-- Button trigger modal -->
<button type="button" class="btn aniadir" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Añadir Producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow" style="border: 5px solid #B8001F; border-radius: 5px;">
      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" id="createForm" novalidate>
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Añadir Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <label for="inputNameP" class="form-label">Nombre <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-2" id="inputNameP" name="nombre" required minlength="2" maxlength="100"pattern="[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+" title="Solo se permiten letras y espacios">
              <div class="invalid-feedback">El nombre es requerido y debe tener entre 2 y 100 caracteres (solo letras y espacios).</div>
            </div>

            <div class="col-12">
              <label for="inputDesc" class="form-label">Descripción <span class="text-danger">*</span></label>
              <textarea class="form-control rounded-2" id="inputDesc" rows="3" name="descripcion" required maxlength="500"></textarea>
              <div class="form-text">Máximo 500 caracteres</div>
              <div class="invalid-feedback">La descripción no puede exceder los 500 caracteres.</div>
            </div>

            <div class="col-md-6">
              <label for="inputPrecio" class="form-label">Precio <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text bg-light rounded-start-2">$</span>
                <input type="number" class="form-control rounded-end-2" id="inputPrecio" min="0.01" max="9999.99" step="0.01" placeholder="0.00" name="precio" required>
              </div>
              <div class="invalid-feedback">El precio debe ser un número válido entre $0.01 y $9999.99.</div>
            </div>

            <div class="col-md-6">
              <label for="inputCatg" class="form-label">Categoría <span class="text-danger">*</span></label>
              <select class="form-select rounded-2" id="inputCatg" name="categoria" required>
                <option value="" selected disabled>Seleccionar...</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Por favor selecciona una categoría.</div>
            </div>

            <div class="col-12">
              <label for="formFile" class="form-label">Imagen del producto</label>
              <input class="form-control rounded-2" type="file" id="formFile" accept=".png, .jpg, .jpeg, .webp" aria-describedby="fileHelp" name="imagen">
              <div id="fileHelp" class="form-text">
                Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
              </div>
              <div class="invalid-feedback">Solo se permiten archivos de imagen (PNG, JPG, JPEG, WEBP) con tamaño máximo de 5MB.</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Crear Producto</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #B8001F; border-radius: 8px;">
      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">+ Añadir Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="inputNameP" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="inputNameP" name="nombre" required>
            </div>

            <div class="col-md-6">
              <label for="inputDesc" class="form-label">Descripción</label>
              <textarea class="form-control" id="inputDesc" rows="3" name="descripcion"></textarea>
            </div>

            <div class="col-md-6">
              <label for="inputPrecio" class="form-label">Precio</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="inputPrecio" min="0" step="0.01" placeholder="0.00" name="precio" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputCatg" class="form-label">Categoría</label>
              <select class="form-select" id="inputCatg" name="categoria" required>
                <option value="" selected disabled>Seleccionar...</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Imagen del producto</label>
              <input class="form-control" type="file" id="formFile" 
                    accept=".png, .jpg, .jpeg, .webp"
                    aria-describedby="fileHelp" name="imagen">
              <div id="fileHelp" class="form-text">
                Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Crear Producto</button>
        </div>
      </form>
    </div>
  </div>
</div> -->