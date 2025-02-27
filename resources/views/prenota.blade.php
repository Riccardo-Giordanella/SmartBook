<x-layout>
    <!-- Hero -->
    <header class="p-5 text-center bg-image background d-flex justify-content-center align-items-center">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-white p-5">
                    <h3 class="display-3">{{ Auth::user()->name }}, Prenota il tuo appuntamento</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- Hero -->
    {{-- Calendario --}}
    <section class="mt-3">
        <div class="bg-white container rounded-5">
            <h3 class="text-center">Stai prenotando l'appuntamento per il codice fiscale: <span
                    class="text-uppercase fw-bold">{{ Auth::user()->fiscalcode }}</span></h3>
        </div>
        <x-prenota />
    </section>
    {{-- End Calendario --}}
</x-layout>
