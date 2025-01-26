@extends('app')


@section('body')
<section class="bg-gradient-primary">
<div class="bg-gradient-primary vh-100">

    <div class="container py-5">

        <div class="card border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row align-items-center">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <div class="p-5">
                            <h1 class="h4 text-gray-900 mb-4">TW Group coworking</h1>
                            <img src="{{asset('storage/images/businesspeople-meeting-1.jpg')}}" class="img-fluid rounded-lg" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Inicia sesión</h1>
                            </div>
                            <form class="user" action="{{ url('login') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <input id="email" name="email" type="text" class="form-control form-control-user py-2" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback d-block">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <input id="password" name="password" type="password" class="form-control form-control-user py-2" placeholder="Contraseña">
                                    @error('password')
                                    <span class="invalid-feedback d-block">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    @error('credentials')
                                    <span class="invalid-feedback d-block">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Iniciar sesión
                                </button>
                            </form>
                            <div class="text-center mt-5">
                                <a class="small" href="{{ route('signup') }}">No tienes una cuenta? Creala aqui</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</section>
@endsection