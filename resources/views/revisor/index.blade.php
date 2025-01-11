<x-layout>
    <x-modal />
    @if (session()->has('message'))
    <div class="row justify-content-center">
        <div class="col-5 alert alert-success text-center shadow rounded">
            {{session('message')}}
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
                <p>Giorno: {{ $appointments_to_check->day}} / {{$appointments_to_check->month}} /       {{$appointments_to_check->year}}</p>
                <p>Orario: {{$appointments_to_check->hour}} : {{$appointments_to_check->minute }}</p>
                <p>Assistito: {{ $appointments_to_check->user->name}}</p>
                <p>Codice Fiscale: <span class="text-uppercase">{{$appointments_to_check->user->fiscalcode }}</span></p>
                <div class="d-flex pb-4 justify-content-around">
                    <form action="{{ route('reject', ['appointment' => $appointments_to_check]) }}" method="POST" class="mx-3">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="btn btn-danger py-2 px-5 fw-bold" <button type="button" class="btn btn-danger py-2 px-5 fw-bold" data-bs-toggle="modal" data-bs-target="#confirmRejectModal">
                            Rifiuta
                        </button>
                    </form>                    
                    <form action="{{ route('accept', ['appointment' => $appointments_to_check]) }}" method="POST" class="mx-3"> 
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py-2 px-5 fw-bold" type="submit">Accetta</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center height-custom text-center">
            <div class="col-12"> 
                <h1 class="fst-italic display-4 text-white"> Nessun appuntamento da revisionare </h1> 
                <a href="{{ route('homepage') }}" class="my-5 btn btn-success">Torna all'homepage</a> 
            </div>
        </div>
        @endif
    </div>
</x-layout>