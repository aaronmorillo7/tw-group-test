@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edita la sala: {{ $room->name }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="">
                <form class="user" action="{{ route('rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="form-label">Nombre</label>
                        <input id="name" name="name" type="text" class="form-control py-2" placeholder="Sala #1" value="{{ $room->name }}">
                        @error('name')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="form-label">Descripción</label>
                        <textarea id="description" name="description" type="text" class="form-control py-2">{{ $room->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-user">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection