@props(['item' => null])

@php
    // Base para comida rápida — si no se pasa `item`, usamos un ejemplo básico
    $example = [
        'id' => 1,
        'name' => 'Chilidog',
        'price' => '54,99€',
        'description' => 'Un hotdog fusionado con chili creando el famoso chili dog.',
        'image' => Vite::asset('resources/images/letras.png'),
        'category' => 'Especial',
        'available' => true,
    ];

    $it = $item ?? $example;
    // Soporta objeto o array
    if(is_object($it)){
        $id = $it->id ?? $example['id'];
        $name = $it->name ?? $it->nombre ?? $example['name'];
        $price = $it->price ?? $it->precio ?? $example['price'];
        $description = $it->description ?? $it->descripcion ?? $example['description'];
        $image = $it->image ?? $example['image'];
        $category = $it->category ?? $it->categoria ?? $example['category'];
        $available = $it->available ?? true;
    } else {
        $id = $it['id'] ?? $example['id'];
        $name = $it['name'] ?? $it['nombre'] ?? $example['name'];
        $price = $it['price'] ?? $it['precio'] ?? $example['price'];
        $description = $it['description'] ?? $it['descripcion'] ?? $example['description'];
        $image = $it['image'] ?? $example['image'];
        $category = $it['category'] ?? $it['categoria'] ?? $example['category'];
        $available = $it['available'] ?? true;
    }
@endphp

{{-- Agregué col-sm-6 col-md-4 col-lg-3 para que se organicen automáticamente --}}
<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="food-card card h-100 shadow-sm" data-id="{{ $id }}" style="border: 2px solid #B8001F; border-radius: 8px;">
        <div class="position-relative">
            {{-- Espacio reservado para la imagen: no mostramos imágenes dinámicas, usamos un placeholder (hamburguer-red) o simplemente el espacio en blanco --}}
            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:160px; background-image: url('{{ Vite::asset('resources/images/hotdog.png') }}'); background-repeat: no-repeat; background-position: center; background-size: contain;">
            </div>

            @if($available)
                <span class="badge bg-success position-absolute" style="top:8px; right:8px;">Activo</span>
            @else
                <span class="badge bg-secondary position-absolute" style="top:8px; right:8px;">Agotado</span>
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