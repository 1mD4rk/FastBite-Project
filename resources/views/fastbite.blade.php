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
    
    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <br>
        <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <br>
        <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>

    <div class="container my-4">
        <h1 class="text-center" style="font-weight: bold; margin-left: 1%; color: {{ $textcolor }};">Gestion de Productos 🍔</h1>
    </div>

    <div class="d-flex justify-content-end mx-5">
        <x-modalcreate :categorias="$categorias" />
    </div>
   
    <div class="container my-5">
        <div class="row gx-4 gy-4 justify-content-center">
            @forelse($productos as $producto)
                <x-cardfood :item="$producto" :categorias="$categorias" />
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