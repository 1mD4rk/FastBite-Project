@props(['item'])

@php
    // Extraer datos del item (objeto Eloquent)
    $id = $item->id;
    $name = $item->nombre; 
    $price = $item->precio; 
    $description = $item->descripcion; 
    $category = $item->categoriaRelacion->nombre ?? 'Sin categoría';
    $available = is_null($item->deleted_at);
@endphp

<div class="col-sm-6 col-md-4 col-lg-3 justify-content-center">
    <div class="food-card card h-100 shadow-sm mx-auto" data-id="{{ $id }}" style="border: 2px solid #B8001F; border-radius: 8px;">
        <div class="position-relative">
            {{-- Imagen --}}
            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:160px; background-image: url('{{ Vite::asset('resources/images/hotdog.png') }}'); background-repeat: no-repeat; background-position: center; background-size: contain;">
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
                    <button type="button" class="btn btn-sm btn-outline-secondary" title="Editar">
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