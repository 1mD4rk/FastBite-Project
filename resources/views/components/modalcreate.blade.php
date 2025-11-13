@props(['categorias' => []])

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Añadir Producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #B8001F; border-radius: 8px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">+ Añadir Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row g-3">
          <div class="col-md-6">
            <label for="inputNameP" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="inputNameP">
          </div>

          <div class="col-md-6">
            <label for="inputDesc" class="form-label">Descripción</label>
            <textarea class="form-control" id="inputDesc" rows="3"></textarea>
          </div>

          <div class="col-md-6">
              <label for="inputPrecio" class="form-label">Precio</label>
              <div class="input-group">
                  <span class="input-group-text">$</span>
                  <input type="number" class="form-control" id="inputPrecio" min="0" step="0.01" placeholder="0.00">
              </div>
          </div>

          <div class="col-md-6">
              <label for="inputCatg" class="form-label">Categoría</label>
              <select class="form-select" id="inputCatg" name="categoria_id">
                  <option selected disabled>Seleccionar...</option>
                  @foreach($categorias as $categoria)
                      <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-3">
              <label for="formFile" class="form-label">Imagen del producto</label>
              <input class="form-control" type="file" id="formFile" 
                    accept=".png, .jpg, .jpeg, .webp"
                    aria-describedby="fileHelp">
              <div id="fileHelp" class="form-text">
                  Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
              </div>
          </div>
          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">Crear Producto</button>
      </div>
    </div>
  </div>
</div>