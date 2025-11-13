@props(['textcolor' => '#000000ff'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastBite - Gestión de Productos</title>
    <link href="{{ Vite::asset('resources/images/hamburguer.png') }}" rel="icon">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
    
    <x-barra />
    
    <br>

    <div class="container my-4">
        <h1 class="text-center" style="font-weight: bold; margin-left: 1%; color: {{ $textcolor }};">Gestion de Productos 🍔</h1>
    </div>

    <div class="d-flex justify-content-end mx-5">
        <x-modalcreate :categorias="$categorias" />
    </div>
   

    <div class="container my-5">
        <div class="row gx-4 gy-4 justify-content-center">
            <!-- Iterar sobre los productos de la base de datos -->
            @forelse($productos as $producto)
                <x-moviecard :item="$producto" />
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No hay productos disponibles.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div>
        <footer><x-footer /></footer>
    </div>
    

</body>
</html>