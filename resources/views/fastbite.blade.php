<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastBite</title>
     <link href="{{ Vite::asset('resources/images/hamburguer.png') }}" rel="icon">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
    <body>
        
        <x-barra />

        <!-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                @foreach ($categorias as $categoria)
                    <li><a class="dropdown-item" href="#">{{ $categoria->nombre }}</a></li>
                 @endforeach
            </ul>
        </div> -->


        <footer><x-footer /></footer>

    </body>
</html>