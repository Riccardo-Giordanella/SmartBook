<x-layout>
    <!-- Hero -->
    <header class="p-5 text-center bg-image background d-flex justify-content-center align-items-center">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-white p-5">
                    <h3 class="display-3">{{Auth::user()->name}}, Prenota il tuo appuntamento</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- Hero -->
    {{-- Calendario --}}
    <section>
        <x-prenota />
    </section>
    {{-- End Calendario --}}
</x-layout>