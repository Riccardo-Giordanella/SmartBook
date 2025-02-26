<x-layout>
    <section class="my-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 rounded-4 bg-black">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 form-reg rounded-5">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 bg-white rounded-3">Registrati</p>
                                    <form method="POST" action="{{route('register')}}" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="mb-4">
                                            @error('fiscalcode') <span class="alert alert-danger">{{ $message }}</span> @enderror
                                        </div> 
                                        <div class="d-flex flex-row align-items-center justify-content-center mb-4 bg-white">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 form-floating">
                                                <input type="text" id="fiscalcode" class="form-control" placeholder="Codice Fiscale" value="{{old('fiscalcode')}}" name="fiscalcode"/>
                                                <label class="form-label" for="fiscalcode">Codice Fiscale</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
                                        </div>      
                                        <div class="d-flex flex-row align-items-center mb-4 bg-white">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 form-floating">
                                                <input type="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email"/>
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
                                        </div> 
                                        <div class="d-flex flex-row align-items-center mb-4 bg-white">
                                            <i class="fas fa-signature fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 form-floating">
                                                <input type="text" id="name" class="form-control" placeholder="Nome" value="{{old('name')}}" name="name"/>
                                                <label class="form-label" for="name">Nome</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            @error('password') <span class="alert alert-danger">{{ $message }}</span> @enderror
                                        </div>                                    
                                        <div class="d-flex flex-row align-items-center justify-content-center mb-4 bg-white">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 form-floating">
                                                <input type="password" id="password" class="form-control" placeholder="Password" value="{{old('password')}}" name="password"/>
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            @error('password_confirmation') <span class="alert alert-danger">{{ $message }}</span> @enderror
                                        </div> 
                                        <div class="d-flex flex-row align-items-center mb-4 bg-white">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 form-floating">
                                                <input type="password" id="password-confirmation" class="form-control" placeholder="Ripeti password" value="{{old('password_confirmation')}}" name="password_confirmation"/>
                                                <label class="form-label" for="password-confirmation">Ripeti password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button  type="submit" class="btn btn-primary btn-lg">Registrati</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 justify-content-center">
                                    <img src="{{asset('black.png')}}" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</x-layout>