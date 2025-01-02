<x-layout>
    
    @guest
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                <!-- Hero -->
                <div class="p-5 text-center bg-image rounded-3 background">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="display-1 mb-3">Benvenuto/a!</h1>
                            <h3 class="display-3 mb-3">Per iniziare Registrati oppure Accedi</h3>
                            <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button">Registrati</a>
                            <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button">Accedi</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero -->
        </div>
    </div>
</div>
@endguest

</x-layout>