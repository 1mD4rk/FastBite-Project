@props(['bgcolor' => '#B8001F', 'textcolor' => '#FFFFFF'])

<nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: {{ $bgcolor }}; padding: 0.5rem 0;">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <img src="{{ Vite::asset('resources/images/hamburguer.png') }}" width="40" height="40" alt="Logo" class="d-inline-block align-text-top">
            <div class="d-flex flex-column ms-2">
                <img src="{{ Vite::asset('resources/images/fastbite.png') }}" height="24" alt="FastBite Logo">
                <img src="{{ Vite::asset('resources/images/subtitle.png') }}" height="12" alt="Subtitle">
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Puedes agregar elementos de menú aquí si es necesario -->
            </ul>
            <form class="d-flex me-3" role="search" style="width: 40%;">
                <div class="input-group">
                    <input class="form-control rounded-pill border-0 shadow-sm" type="search" placeholder="Buscar productos..." aria-label="Buscar" style="padding: 0.5rem 1rem; font-size: 0.9rem;">
                    <button type="submit" class="btn btn-link text-dark position-absolute end-0 top-50 translate-middle-y me-2" aria-label="Buscar" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center; padding: 0;">
                        <img src="{{ Vite::asset('resources/images/search.png') }}" width="20" height="20" alt="Search">
                    </button>
                </div>
            </form>
            <div class="d-flex align-items-center bg-dark bg-opacity-25 rounded-pill px-3 py-1">
                <img src="{{ Vite::asset('resources/images/user.png') }}" width="32" height="32" alt="User" class="rounded-circle" />
                <span class="ms-2 text-white fw-semibold" style="font-size:0.9rem;">Administrador</span>
            </div>
        </div>
    </div>
</nav>