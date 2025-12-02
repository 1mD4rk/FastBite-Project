@props(['categorias' => []])

@php
    $categoriasConTamano = ['Pizzas', 'Bebidas', 'Papas Fritas', 'Alitas de Pollo', 'Postres'];
@endphp

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
          <!-- Selección de tipo de producto -->
          <div class="mb-4">
            <div class="d-flex gap-2 mb-3">
              <input type="radio" class="btn-check" name="tipo_producto" id="tipoConTamano" value="con_tamano" 
                     data-bs-toggle="collapse" data-bs-target="#seccionConTamano" autocomplete="off" checked>
              <label class="btn btn-outline-danger flex-grow-1" for="tipoConTamano">
                Con Tamaño
              </label>
              
              <input type="radio" class="btn-check" name="tipo_producto" id="tipoSinTamano" value="sin_tamano"
                     data-bs-toggle="collapse" data-bs-target="#seccionSinTamano" autocomplete="off">
              <label class="btn btn-outline-secondary flex-grow-1" for="tipoSinTamano">
                Sin Tamaño
              </label>
            </div>
          </div>

          <div class="row g-3">
            <!-- Nombre -->
            <div class="col-12">
              <label for="inputNameP" class="form-label">Nombre <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-2" id="inputNameP" name="nombre" required minlength="2" maxlength="100" pattern="[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+" title="Solo se permiten letras y espacios">
              <div class="invalid-feedback">El nombre es requerido y debe tener entre 2 y 100 caracteres (solo letras y espacios).</div>
            </div>

            <!-- Descripción -->
            <div class="col-12">
              <label for="inputDesc" class="form-label">Descripción <span class="text-danger">*</span></label>
              <textarea class="form-control rounded-2" id="inputDesc" rows="3" name="descripcion" required maxlength="500"></textarea>
              <div class="form-text">Máximo 500 caracteres</div>
              <div class="invalid-feedback">La descripción no puede exceder los 500 caracteres.</div>
            </div>

            <!-- Sección CON tamaño -->
            <div class="collapse show" id="seccionConTamano" data-bs-parent=".modal-body">
              <div class="row g-3">
                <!-- Categorías con tamaño -->
                <div class="col-md-6">
                  <label for="categoriaConTamano" class="form-label">Categoría <span class="text-danger">*</span></label>
                  <select class="form-select rounded-2" id="categoriaConTamano" name="categoria_con_tamano" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    @foreach($categorias as $categoria)
                      @if(in_array($categoria->nombre, $categoriasConTamano))
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                      @endif
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Por favor selecciona una categoría.</div>
                </div>

                <!-- Tamaño -->
                <div class="col-md-6">
                  <label for="inputTamano" class="form-label">Tamaño <span class="text-danger">*</span></label>
                  <select class="form-select rounded-2" id="inputTamano" name="tamano_con" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Personal">Personal</option>
                  </select>
                  <div class="invalid-feedback">Por favor selecciona un tamaño.</div>
                </div>

                <!-- Precio debajo en Con Tamaño -->
                <div class="col-md-12">
                  <label for="inputPrecio" class="form-label">Precio <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light rounded-start-2">$</span>
                    <input type="number" class="form-control rounded-end-2" id="inputPrecio" min="0.01" max="9999.99" step="0.01" placeholder="0.00" name="precio_con" required>
                  </div>
                  <div class="invalid-feedback">El precio debe ser un número válido entre $0.01 y $9999.99.</div>
                </div>
              </div>
            </div>

            <!-- Sección SIN tamaño -->
            <div class="collapse" id="seccionSinTamano" data-bs-parent=".modal-body">
              <div class="row g-3">
                <!-- Categorías sin tamaño -->
                <div class="col-md-6">
                  <label for="categoriaSinTamano" class="form-label">Categoría <span class="text-danger">*</span></label>
                  <select class="form-select rounded-2" id="categoriaSinTamano" name="categoria_sin_tamano" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    @foreach($categorias as $categoria)
                      @if(!in_array($categoria->nombre, $categoriasConTamano))
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                      @endif
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Por favor selecciona una categoría.</div>
                </div>

                <!-- Precio al lado en Sin Tamaño -->
                <div class="col-md-6">
                  <label for="inputPrecio2" class="form-label">Precio <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light rounded-start-2">$</span>
                    <input type="number" class="form-control rounded-end-2" id="inputPrecio2" min="0.01" max="9999.99" step="0.01" placeholder="0.00" name="precio_sin" required>
                  </div>
                  <div class="invalid-feedback">El precio debe ser un número válido entre $0.01 y $9999.99.</div>
                </div>
              </div>
            </div>

            <!-- Imagen -->
            <div class="col-12">
              <label for="formFile" class="form-label">Imagen del producto <span class="text-danger">*</span></label>
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