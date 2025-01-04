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
                    <li><form method="POST" action="{{ route('logout') }}"> @csrf <button type="submit" class="dropdown-item text-danger">Logout</button> </form></li>
                </ul>
              </div>
            
            @endguest
        </div>
    </div>
</nav>
