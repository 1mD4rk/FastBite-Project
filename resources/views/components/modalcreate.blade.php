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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow" style="border: 5px solid #B8001F; border-radius: 5px;">
      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Añadir Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <label for="inputNameP" class="form-label">Nombre</label>
              <input type="text" class="form-control rounded-2" id="inputNameP" name="nombre" required>
            </div>

            <div class="col-12">
              <label for="inputDesc" class="form-label">Descripción</label>
              <textarea class="form-control rounded-2" id="inputDesc" rows="3" name="descripcion"></textarea>
            </div>

            <div class="col-md-6">
              <label for="inputPrecio" class="form-label">Precio</label>
              <div class="input-group">
                <span class="input-group-text bg-light rounded-start-2">$</span>
                <input type="number" class="form-control rounded-end-2" id="inputPrecio" min="0" step="0.01" placeholder="0.00" name="precio" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputCatg" class="form-label">Categoría</label>
              <select class="form-select rounded-2" id="inputCatg" name="categoria" required>
                <option value="" selected disabled>Seleccionar...</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12">
              <label for="formFile" class="form-label">Imagen del producto</label>
              <input class="form-control rounded-2" type="file" id="formFile" 
                    accept=".png, .jpg, .jpeg, .webp"
                    aria-describedby="fileHelp" name="imagen">
              <div id="fileHelp" class="form-text">
                Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success rounded-pill">Crear Producto</button>
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