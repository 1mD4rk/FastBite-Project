@props(['textcolor' => '#000000ff'])

<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastBite - Gestión de Productos</title>
    <link href="{{ Vite::asset('resources/images/hamburguer.png') }}" rel="icon">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body class="bg-light">
    
    <x-barra />
    
    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Error:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <main class="py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="display-6 fw-bold mb-1" style="color: {{ $textcolor }};">Gestión de Productos</h1>
                    <p class="text-muted mb-0">Administra el menú de FastBite 🍔</p>
                </div>
                <div>
                    <x-modalcreate :categorias="$categorias" />
                </div>
            </div>

            <!-- Contador de productos -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body py-2" style="border: 1px solid #d1d1d1ff; border-radius: 8px;">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-circle me-3">
                                    <span class="text-danger-emphasis fw-bold">{{ $productos->count() }}</span>
                                </div>
                                <div>
                                    <small class="fw-bold fs-6">Total Productos</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid de productos -->
            @if($productos->count() > 0)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach($productos as $producto)
                        <x-cardfood :item="$producto" :categorias="$categorias" />
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-utensils fa-4x text-muted opacity-25"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay productos disponibles</h4>
                    <p class="text-muted mb-4">Comienza agregando tu primer producto al menú</p>
                    <x-modalcreate :categorias="$categorias" />
                </div>
            @endif

        </div>
    </main>

    <footer class="mt-5">
        <x-footer />
    </footer>

</body>
</html>