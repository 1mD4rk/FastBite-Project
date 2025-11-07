@props(['bgcolor' => '#b3253c7a'])

<footer class="text-light mt-5" style="background-color: {{ $bgcolor }};">
    <div class="container py-3">
        <br>
        <div class="row">
            <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ Vite::asset('resources/images/hamburguer-red.png') }}" alt="FastBite" style="height:60px;">
                        <div class="d-inline-block ms-3 text-center">
                            <img src="{{ Vite::asset('resources/images/fastbite-red.png') }}" height="55" alt="Logo" style="margin-bottom:-7px; margin-left:-4px;" >
                            <img src="{{ Vite::asset('resources/images/subtitle-black.png') }}" height="20" alt="Subtitle" class="d-block mt-1">
                        </div>
                    </div>
                <p class="small text-light" style="margin-bottom:-7px;">FastBite — comida rápida y deliciosa. Síguenos para ofertas y novedades.</p>
            </div>

            <div class="col-6 col-md-2 mb-4">
                <h6 class="text-uppercase">Enlaces</h6>
                <ul class="list-unstyled small">
                    <li class="text-light text-decoration-none">Inicio</li>
                    <li class="text-light text-decoration-none">Menú</li>
                    <li class="text-light text-decoration-none">Nosotros</li>
                    <li class="text-light text-decoration-none">Contacto</li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-2">
                <h6 class="text-uppercase">Contacto</h6>
                <address class="small text-light mb-0">
                    Calle Principal 123<br>
                    Ciudad, País<br>
                    +34 123 456 789<br>
                    info@fastbite.com
                </address>
            </div>
        </div>

        <div class="border-top border-danger-subtle text-center small text-light">
            &copy; {{ date('Y') }} FastBite. Todos los derechos reservados.
        </div>
    </div>
</footer>