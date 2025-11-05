@props(['bgcolor' => '#a14b5a7a'])

<footer class="text-light mt-5" style="background-color: {{ $bgcolor }};">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                    <img src="{{ Vite::asset('resources/images/letras.png') }}" alt="FastBite" style="height:40px;"><img src="{{ Vite::asset('resources/images/LOGO.png') }}" height="55" alt="Logo" style="margin-bottom:10px;">
                    
                <p class="small text-light">FastBite — comida rápida y deliciosa. Síguenos para ofertas y novedades.</p>
            </div>

            <div class="col-6 col-md-2 mb-4">
                <h6 class="text-uppercase">Enlaces</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-light text-decoration-none">Inicio</a></li>
                    <li><a href="{{ url('/menu') }}" class="text-light text-decoration-none">Menú</a></li>
                    <li><a href="{{ url('/about') }}" class="text-light text-decoration-none">Nosotros</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-light text-decoration-none">Contacto</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-2">
                <h6 class="text-uppercase">Contacto</h6>
                <address class="small text-light mb-0">
                    Calle Principal 123<br>
                    Ciudad, País<br>
                    <a href="tel:+34123456789" class="text-light text-decoration-none">+34 123 456 789</a><br>
                    <a href="mailto:info@fastbite.com" class="text-light text-decoration-none">info@fastbite.com</a>
                </address>
            </div>
        </div>

        <div class="border-top border-danger-subtle text-center small text-light">
            &copy; {{ date('Y') }} FastBite. Todos los derechos reservados.
        </div>
    </div>
</footer>