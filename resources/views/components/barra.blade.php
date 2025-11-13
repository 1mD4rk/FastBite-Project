@props(['bgcolor' => '#B8001F', 'textcolor' => '#FFFFFF'])

<nav class="navbar navbar-expand-lg" style="background-color: {{ $bgcolor }}; padding: 0.4rem 0;">
    <div class="container-fluid" style="background-color: {{ $bgcolor }}; padding: 0.2rem 1rem;">
        <div class="d-flex align-items-center">
            <img src="{{ Vite::asset('resources/images/hamburguer.png') }}" width="46" height="37" alt="Logo">
            <div class="d-flex flex-column ms-3">
                <img src="{{ Vite::asset('resources/images/fastbite.png') }}" height="28" alt="FastBite Logo">
                <img src="{{ Vite::asset('resources/images/subtitle.png') }}" height="15" alt="Subtitle">
            </div>
        </div>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color: {{ $textcolor }}; font-family: 'Josefin Sans Medium'; font-size: 18px; padding-right: 20px;">Administrator</a>
                </li> -->
            </ul>

            <form class="d-flex" role="search" style="width: 50%;">
                <div class="position-relative" style="width: 60%;">
                    <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" style="border-radius: 53px; border: none; padding: .5rem .8rem; height:36px; font-size:0.9rem;"/>
                    <button type="submit" class="btn" aria-label="Buscar" style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 35px; height: 35px; display:flex; align-items:center; justify-content:center; padding: 0;">
                        <img src="{{ Vite::asset('resources/images/search.png') }}" width="24" height="24" alt="Search">
                    </button>
                </div>
            </form>

            <div style="background-color: #80061B; padding: 5px 8px; border-radius: 2px; display:flex; align-items:center; gap:8px;">
                <img src="{{ Vite::asset('resources/images/user.png') }}" width="32" height="32" alt="User" style="object-fit:cover;" />
                <span style="color: {{ $textcolor }}; font-weight:600; font-size:0.95rem;">Administrador</span>
            </div>
        </div>
    </div>
</nav>
