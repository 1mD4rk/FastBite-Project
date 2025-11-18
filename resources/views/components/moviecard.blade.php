@props(['item', 'categorias' => []])

@php
    // Extraer datos del item (objeto Eloquent)
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

            @if($available)
                <span class="badge bg-success position-absolute" style="top:8px; right:8px;">Activo</span>
            @else
                <span class="badge bg-secondary position-absolute" style="top:8px; right:8px;">Eliminado</span>
            @endif
        </div>

        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h6 class="card-title mb-0" style="font-weight:700">{{ $name }}</h6>
                <span class="text-primary fw-bold">{{ $price }}$</span>
            </div>

            <p class="card-text small text-muted mb-3">{{ $description }}</p>

            <div class="mt-auto d-flex justify-content-between align-items-center">
                <div class="small text-muted">{{ $category }}</div>

                <div class="d-flex gap-2">
                    {{-- Botón editar - ahora pasa el ID específico --}}
                    <button type="button" class="btn btn-sm btn-outline-secondary" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editModal{{ $id }}" 
                            title="Editar">
                        ✏
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-warning" title="Ocultar/Mostrar">
                        👁️
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-danger" title="Eliminar">
                        🗑️
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="editModal{{ $id }}" tabindex="-1" 
     aria-labelledby="editModalLabel{{ $id }}" aria-hidden="true" 
     data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: 5px solid #B8001F; border-radius: 8px;">
      <form action="{{ route('productos.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel{{ $id }}">
            Editar Producto: {{ $name }}
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="inputNameP{{ $id }}" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="inputNameP{{ $id }}" name="nombre" 
                     value="{{ $name }}" required>
            </div>

            <div class="col-md-6">
              <label for="inputDesc{{ $id }}" class="form-label">Descripción</label>
              <textarea class="form-control" id="inputDesc{{ $id }}" rows="3" name="descripcion">{{ $description }}</textarea>
            </div>

            <div class="col-md-6">
              <label for="inputPrecio{{ $id }}" class="form-label">Precio</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="inputPrecio{{ $id }}" min="0" step="0.01" 
                       placeholder="0.00" name="precio" 
                       value="{{ $price }}" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="inputCatg{{ $id }}" class="form-label">Categoría</label>
              <select class="form-select" id="inputCatg{{ $id }}" name="categoria" required>
                <option value="" disabled>Seleccionar...</option>
                @foreach($categorias as $categoria)
                  <option value="{{ $categoria->id }}" 
                    {{ $item->categoria == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="formFile{{ $id }}" class="form-label">Imagen del producto</label>
              <input class="form-control" type="file" id="formFile{{ $id }}" 
                    accept=".png, .jpg, .jpeg, .webp"
                    aria-describedby="fileHelp{{ $id }}" name="imagen">
              <div id="fileHelp{{ $id }}" class="form-text">
                Formatos aceptados: PNG, JPG, JPEG, WEBP. Tamaño máximo: 5MB
                @if($image)
                  <br>Imagen actual: <a href="{{ asset('storage/' . $image) }}" target="_blank">{{ basename($image) }}</a>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">
            Actualizar Producto
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal desactivar -->
 


<!-- Modal eliminar total -->