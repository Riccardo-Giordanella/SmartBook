<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="https://icons.iconarchive.com/icons/wwalczyszyn/android-style-honeycomb/48/Calendar-icon.png" alt="Logo">Calendar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('prenota')}}">Prenota un appuntamento</a>
                </li>
                @endauth
            </ul>
            @guest
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
            @else
            <div class="btn-group dropstart">
                <a type="button" class="dropdown-toggle text-white nolist" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                    @if (Auth::user()->is_revisor)
                    <li class="text-center">
                        <a type="button" href="{{route('revisor.index')}}" class="text-white nolist">Zona Revisore</a>
                    </li>
                    @endif
                    <li class="text-center my-3">
                        <a type="button" class="text-white nolist" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            Informazioni
                        </a>
                    </li>
                    <li class="text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf 
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endguest
        </div>
    </div>
</nav>

@if (Auth::user())
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Informazioni Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <section>
            <p>Codice fiscale: <span class="text-uppercase">{{Auth::user()->fiscalcode}}</span></p>
            <p>Email: {{Auth::user()->email}}</p>
            <p>Nome: {{Auth::user()->name}}</p>
        </section>
    </div>
</div>
@endif