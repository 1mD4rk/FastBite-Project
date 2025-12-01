@props(['item', 'categorias' => []])

@php
    $id = $item->id;
    $name = $item->nombre; 
    $price = $item->precio; 
    $description = $item->descripcion; 
    $category = $item->categoriaRelacion->nombre ?? 'Sin categoría';
    $image = $item->imagen; 
    $available = is_null($item->deleted_at);
@endphp

<div class="col-sm-6 col-md-4 col-lg-3 justify-content-center">
    <div class="food-card card h-100 shadow-sm mx-auto" data-id="{{ $id }}" style="border: 2px solid #B8001F; border-radius: 8px;">
        <div class="position-relative">
            
            <div class="card-img-top bg-light d-flex align-items-center justify-content-center p-2" style="height:160px; overflow: hidden;">
                <img src="{{ asset('storage/' . $image) }}" alt="{{ $name }}" 
                     class="img-fluid h-100 w-100" 
                     style="object-fit: contain;">
            </div>

            <div class="position-absolute bottom-0 start-0 m-2">
                <span class="badge bg-dark bg-opacity-75 text-white fs-6 px-3 py-2">
                    ${{ number_format($price, 2) }}
                </span>
            </div>
        </div>

        <div class="card-body d-flex flex-column">
          <div class="mb-2">
                <span class="badge text-bg-danger bg-opacity-75">
                    {{ $category }}
                </span>
          </div>

            <div class="d-flex justify-content-between align-items-start mb-2">
                <h6 class="card-title mb-0 fs-4" style="font-weight:700">{{ $name }}</h6>
            </div>

            <p class="card-text small text-muted mb-3">{{ $description }}</p>

          <div class="mt-auto d-flex justify-content-between align-items-center border-top pt-3">
              <div>
                  @if($available)
                  <span class="badge bg-success bg-opacity-10 text-success border border-success fs-6 px-3 py-2">
                      <i class="fas fa-check-circle"></i> Activo
                  </span>
                  @else
                  <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary fs-6 px-3 py-2">
                      <i class="fas fa-eye-slash"></i> Desactivado
                  </span>
                  @endif
              </div>
  
              <div class="d-flex gap-2">
                    @if($available)
                    <button type="button" class="btn btn-sm btn-outline-secondary fs-6" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editModal{{ $id }}" 
                            title="Editar">
                        ✏
                    </button>
                    @endif

                    @if($available)
                        <button type="button" class="btn btn-sm btn-outline-warning fs-6" 
                                data-bs-toggle="modal" 
                                data-bs-target="#desacModal{{ $id }}" 
                                title="Desactivar">
                            👁️
                        </button>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-success fs-6" 
                                data-bs-toggle="modal" 
                                data-bs-target="#activateModal{{ $id }}" 
                                title="Activar">
                            ✅
                        </button>
                    @endif

                    {{-- Botón eliminar permanentemente --}}
                    <button type="button" class="btn btn-sm btn-outline-danger fs-6" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal{{ $id }}" 
                            title="Eliminar Permanentemente">
                        🗑️
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->
@if($available)
<div class="modal fade" id="editModal{{ $id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow" style="border: 5px solid #B8001F; border-radius: 5px;">
      <form action="{{ route('productos.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="editModalLabel{{ $id }}">
            Editar Producto: {{ $name }}
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <label for="inputNameP{{ $id }}" class="form-label">Nombre</label>
              <input type="text" class="form-control rounded-2" id="inputNameP{{ $id }}" name="nombre" 
                     value="{{ $name }}" required>
            </div>

            <div class="col-12">
              <label for="inputDesc{{ $id }}" class="form-label">Descripción</label>
              <textarea class="form-control rounded-2" id="inputDesc{{ $id }}" rows="3" name="descripcion">{{ $description }}</textarea>
            </div>

            <div class="col-md-6">
              <label for="inputPrecio{{ $id }}" class="form-label">Precio</label>
              <div class="input-group">
                <span class="input-group-text bg-light rounded-start-2">$</span>
                <input type="number" class="form-control rounded-end-2" id="inputPrecio{{ $id }}" min="0" step="0.01" 
                       placeholder="0.00" name="precio" 
                       value="{{ $price }}" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputCatg{{ $id }}" class="form-label">Categoría</label>
              <select class="form-select rounded-2" id="inputCatg{{ $id }}" name="categoria" required>
                <option value="" disabled>Seleccionar...</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}" 
                    {{ $item->categoria == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="col-12">
              <label for="formFile{{ $id }}" class="form-label">Imagen del producto</label>
              <input class="form-control rounded-2" type="file" id="formFile{{ $id }}" 
                    accept=".png, .jpg, .jpeg, .webp"
                    aria-describedby="fileHelp{{ $id }}" name="imagen">
              <div id="fileHelp{{ $id }}" class="form-text">
                Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
                @if($image)
                  <br>Imagen actual: <a href="{{ asset('storage/' . $image) }}" target="_blank" class="text-decoration-none">{{ basename($image) }}</a>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Actualizar Producto</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

<!-- Modal desactivar -->
@if($available)
<div class="modal fade" id="desacModal{{ $id }}" tabindex="-1" aria-labelledby="desacModal{{ $id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #B8001F; border-radius: 8px;">
      
      <div class="modal-header">
        <h5 class="modal-title" id="desacModal{{ $id }}">Desactivar Producto: {{ $name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <p>¿Está seguro que desea desactivar el producto: <strong>{{ $name }}</strong>?</p>
        <p class="text-muted">El producto se ocultará pero podrá ser reactivado después.</p>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('productos.destroy', $id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning">Desactivar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<!-- Modal activar -->
@if(!$available)
<div class="modal fade" id="activateModal{{ $id }}" tabindex="-1" aria-labelledby="activateModal{{ $id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #B8001F; border-radius: 8px;">
      
      <div class="modal-header">
        <h5 class="modal-title" id="activateModal{{ $id }}">Activar Producto: {{ $name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <p>¿Está seguro que desea activar el producto: <strong>{{ $name }}</strong>?</p>
        <p class="text-muted">El producto volverá a estar visible para los clientes.</p>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('productos.restore', $id) }}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success">Activar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<!-- Modal eliminar permanentemente -->
<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="deleteModal{{ $id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #dc3545; border-radius: 8px;">
      
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal{{ $id }}">
          @if($available)
            Eliminar Permanentemente: {{ $name }}
          @else
            Eliminar Producto Desactivado: {{ $name }}
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        @if($available)
          <p class="text-danger"><strong>¡Advertencia!</strong> Está a punto de eliminar permanentemente el producto: <strong>{{ $name }}</strong></p>
          <p>Esta acción no se puede deshacer y se perderá toda la información del producto.</p>
        @else
          <p class="text-danger"><strong>¡Advertencia!</strong> Está a punto de eliminar permanentemente el producto desactivado: <strong>{{ $name }}</strong></p>
          <p>Esta acción no se puede deshacer.</p>
        @endif
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('productos.forceDelete', $id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar Permanentemente</button>
        </form>
      </div>
    </div>
  </div>
</div>