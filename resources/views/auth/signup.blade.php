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
                                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta!</h1>
                            </div>
                            <form class="user" action="{{ url('signup') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="email" name="email" type="text" class="form-control form-control-user py-2" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="birth_date" name="birth_date" type="date" class="form-control form-control-user py-2" placeholder="yyyy-mm-dd">
                                        @error('birth_date')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="first_name" name="first_name" type="text" class="form-control form-control-user py-2" placeholder="Nombre">
                                        @error('first_name')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="last_name" name="last_name" type="text" class="form-control form-control-user py-2" placeholder="Apellido">
                                        @error('last_name')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select id="genre" name="genre" class="form-select form-control rounded-pill py-2 bg-white" aria-label="Género">
                                            <option selected>Selecciona tu género</option>
                                            <option value="f">Femenino</option>
                                            <option value="m">Masculino</option>
                                        </select>
                                        @error('genre')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="phone" name="phone" type="text" class="form-control form-control-user py-2" placeholder="Teléfono">
                                        @error('phone')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" name="password" type="password" class="form-control form-control-user py-2" placeholder="Contraseña">
                                        @error('password')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-user py-2" placeholder="Repetir contraseña">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar cuenta
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Ya tienes una cuenta? Inicia sesión aquí</a>
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