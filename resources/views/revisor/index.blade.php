<x-layout>
    @if (session()->has('message'))
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
    </div>
    @endif
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-3">
                <div class="rounded shadow bg-primary">
                    <h1 class="display-5 text-center pb-2 text-white">
                        Revisor dashboard
                    </h1>
                </div>
            </div>
        </div>
        
        @if ($appointments_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
            <div class="bg-dark text-white my-4 rounded shadow d-flex justify-content-center flex-column align-items-center">
                <p>Giorno: {{ $appointments_to_check->day }} / {{ $appointments_to_check->month }} / {{ $appointments_to_check->year }}</p>
                <p>Orario: @if ($appointments_to_check->hour == 9) 0{{ $appointments_to_check->hour }} @else{{ $appointments_to_check->hour }}@endif : @if($appointments_to_check->minute == 0)0{{ $appointments_to_check->minute }}@else {{ $appointments_to_check->minute }}@endif</p>
                <p>Assistito: {{ $appointments_to_check->user->name }}</p>
                <p>Codice Fiscale: <span class="text-uppercase">{{ $appointments_to_check->user->fiscalcode }}</span></p>
                <div class="d-flex pb-4 justify-content-around">
                    <button type="button" class="btn btn-danger" id="confirmRejectButton" data-bs-toggle="modal" data-bs-target="#confirmRejectModal-{{ $appointments_to_check->id }}">Rifiuta</button>                   
                    <form action="{{ route('accept', ['appointment' => $appointments_to_check]) }}" method="POST" class="mx-3"> 
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py-2 px-5 fw-bold" type="submit">Accetta</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Modale di rifiuto per l'appuntamento da controllare --> 
        <div class="modal fade" id="confirmRejectModal-{{ $appointments_to_check->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmRejectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <h5 class="modal-title" id="confirmRejectModalLabel">Sei sicuro?</h5> 
                    </div> 
                    <div class="modal-body">Sei sicuro di voler rifiutare questo appuntamento? Questa azione non è reversibile.</div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('reject', ['appointment' => $appointments_to_check->id]) }}" method="POST" class="mx-3">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger py-2 px-5 fw-bold" data-bs-dismiss="modal">Rifiuta</button>
                        </form>  
                    </div> 
                </div>
            </div> 
        </div>
        @endif
        
        @if($appointments_accepted->isNotEmpty())
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-4">
                <h3 class="display-6">Appuntamenti Confermati:</h3>
            </div>
            <div class="col-4">
                @foreach($appointments_accepted as $appointment)
                <div class="bg-dark text-white my-4 rounded shadow text-center py-1">
                    <p>Giorno: {{ $appointment->day }} / {{ $appointment->month }} / {{ $appointment->year }}</p>
                    <p>Orario: @if ($appointment->hour == 9)0{{ $appointment->hour }} @else{{ $appointment->hour }}@endif : @if ($appointment->minute == 0)0{{ $appointment->minute }}@else{{ $appointment->minute }}@endif</p>
                    <p>Assistito: {{ $appointment->user->name }}</p>
                    <p>Codice Fiscale: <span class="text-uppercase">{{ $appointment->user->fiscalcode }}</span></p>
                    <button type="button" class="btn btn-danger" id="confirmRejectButton2" data-bs-toggle="modal" data-bs-target="#confirmRejectModal2-{{ $appointment->id }}">Annulla</button>
                </div>
                
                <!-- Modale di annullamento per ogni appuntamento --> 
                <div class="modal fade" id="confirmRejectModal2-{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmRejectModalLabel2" aria-hidden="true">
                    <div class="modal-dialog" role="document"> 
                        <div class="modal-content"> 
                            <div class="modal-header"> 
                                <h5 class="modal-title" id="confirmRejectModalLabel2">Sei sicuro?</h5> 
                            </div> 
                            <div class="modal-body"> Sei sicuro di voler annullare questo appuntamento? Questa azione non è reversibile. </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('cancel', ['appointment' => $appointment->id]) }}" method="POST" class="mx-3">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger py-2 px-5 fw-bold" data-bs-dismiss="modal">Annulla</button>
                                </form>  
                            </div> 
                        </div>
                    </div> 
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        @if (!$appointments_to_check && $appointments_accepted->isEmpty())
        <div class="row justify-content-center align-items-center height-custom text-center">
            <div class="col-12"> 
                <h1 class="fst-italic display-4 text-white"> Nessun appuntamento da revisionare </h1> 
                <a href="{{ route('homepage') }}" class="my-5 btn btn-success">Torna all'homepage</a> 
            </div>
        </div>
        @endif
    </div>
</x-layout>