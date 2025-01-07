<x-layout>
    @if(session()->has('errorMessage'))
    <div class="alert alert-danger text-center shadow rounded">
        {{session('errorMessage')}}
    </div>
    @endif
    <header class="container-fluid">
        <div class="row">
            <!-- Hero -->
            <div class="p-5 text-center bg-image background d-flex justify-content-center align-items-center">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="text-white p-5">
                            @guest
                            <h1 class="display-1 mb-3">Benvenuto/a!</h1>
                            <h3 class="display-3 mb-3">Per iniziare Registrati oppure Accedi</h3>
                            <a class="btn btn-outline-light btn-lg" href="{{route('register')}}" role="button">Registrati</a>
                            <a class="btn btn-outline-light btn-lg" href="{{route('login')}}" role="button">Accedi</a>
                            @else
                            <h1 class="display-1 mb-3">Benvenuto/a! {{Auth::user()->name}}</h1>
                            <a class="btn btn-outline-light btn-lg" href="{{route('prenota')}}" role="button">Prenota un appuntamento</a>
                            @endguest
                        </div>
                    </div>
                </div>
                <!-- Hero -->
            </div>
        </div>
    </header>
    
</x-layout>