@props(['bgcolor' => '#B8001F', 'textcolor' => '#FFFFFF'])

<nav class="navbar navbar-expand-lg" style="background-color: {{ $bgcolor }}">
    <div class="container-fluid"  style="background-color: {{ $bgcolor }}">
        <img src="{{ Vite::asset('resources/images/LOGO.png') }}" width="70" height="54" alt="Logo">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" style="color: {{ $textcolor }}; font-family: 'Josefin Sans Medium'; font-size: 22px; padding-right: 25px;">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#" style="color: {{ $textcolor }}; font-family: 'Josefin Sans Medium'; font-size: 22px; padding-right: 30px;">Link</a>
            </li>
        </ul>
            <form class="d-flex" role="search" style="width: 50%;">
                <div class="position-relative" style="width: 60%;">
                    <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" style="border-radius: 66px; border: none; padding: .6rem 1rem; height:45px; font-size:1rem;"/>
                    <button type="submit" class="btn" aria-label="Buscar" style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 44px; height: 44px; display:flex; align-items:center; justify-content:center; padding: 0;"><img src="{{ Vite::asset('resources/images/search.png') }}" width="30" height="30" alt="Search">
                    </button>
                </div>
            </form>
            <div style="background-color: #80061B; padding: 6px 10px; border-radius: 2px; display:flex; align-items:center; gap:10px;">
                <img src="{{ Vite::asset('resources/images/user.png') }}" width="40" height="40" alt="User" style="object-fit:cover;" />
                <span style="color: {{ $textcolor }}; font-weight:600;">Mi Perfil</span>
            </div>
        </div>
    </div>
 </nav>
