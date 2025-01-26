@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Nueva reserva</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="">
                <form class="user" action="{{ route('bookings.create') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="form-label">Sala</label>
                        <select id="room_id" name="room_id" class="form-select form-control py-2 bg-white" aria-label="Género">
                            <option selected>Selecciona una sala</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                        @error('room_id')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="form-label">Fecha de inicio</label>
                        <input id="start_date" name="start_date" type="date" class="form-control py-2" placeholder="Sala #1">
                        @error('start_date')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div><div class="form-group row">
                        <label class="form-label">Hora de inicio</label>
                        <input id="start_time" name="start_time" type="time" class="form-control py-2" placeholder="Sala #1">
                        @error('start_time')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    @error('date')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-user">
                            Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection