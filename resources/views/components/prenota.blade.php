<div class="container">
    <div class="row justify-content-center align-items-center my-5">
        <div class="col-6">
            <form class="bg-dark text-white d-flex flex-column align-items-center justify-content-center rounded shadow p-4" method="POST" action="{{route('appointment.store')}}">
                @csrf
                <div class="mb-3">
                    <p>Oggi è: {{\Carbon\Carbon::now()->locale('it')->isoFormat('LL')}} {{\Carbon\Carbon::now('Europe/Rome')->locale('it')->isoFormat('HH:mm')}}</p>
                </div>
                <p>Seleziona il tipo di servizio</p>
                <div class="mb-3">
                    <select name="type" id="type" class="form-select my-2" aria-label="Tipo" required>
                        <option value="" selected disabled>Seleziona il tipo di servizio</option>
                        <option value="EPAS">Patronato - Epas</option>
                        <option value="CAF">CAF - Cafitalia</option>
                    </select>
                    <select name="service" id="service" class="form-select my-2" aria-label="Servizio" required>
                    </select>
                </div>
                <p>Seleziona la data</p>
                <div class="mb-3 d-flex justify-content-center align-items-center container">
                    {{-- Year --}}
                    <div class="row mx-2">
                        <label for="year" class="form-label">Anno</label>
                        <select name="year" id="year" class="form-select" aria-label="Anno" required>
                            <option value="2025" selected>2025</option>
                        </select>
                    </div>
                    {{-- Year --}}
                    {{-- Month --}}
                    <div class="row mx-2">
                        <label for="month" class="form-label">Mese</label>
                        <select class="form-select" aria-label="Mese" id="month" name="month" required>
                            <option selected disabled>Seleziona il mese</option>
                        </select>
                    </div>
                    {{-- Month --}}
                    {{-- Day --}}
                    <div class="row mx-2">
                        <label for="day" class="form-label">Giorno</label>
                        <select class="form-select" aria-label="Giorno" id="day" name="day" required>
                        </select>
                    </div>
                    {{-- Day --}}
                </div>
                <p>Seleziona l'orario</p>
                <div class="mb-3 d-flex justify-content-center align-items-center container">
                    {{-- Ora --}}
                    <div class="row mx-3">
                        <label for="hour" class="form-label">Ora</label>
                        <select name="hour" id="hour" class="form-control" aria-label="Ora" required>
                            <option selected>Seleziona l'ora</option>
                        </select>
                    </div>
                    {{-- Ora --}}
                    {{-- Minuti --}}
                    <div class="row mx-3">
                        <label for="minute" class="form-label">Minuti</label>
                        <select name="minute" id="minute" class="form-control" aria-label="Minuti" required>
                            <option selected>Seleziona i minuti</option>
                        </select>
                    </div>
                    {{-- Minuti --}}
                </div>
                <button type="submit" class="btn btn-primary my-2">Prenota</button>
            </form>
        </div>
    </div>
</div>

