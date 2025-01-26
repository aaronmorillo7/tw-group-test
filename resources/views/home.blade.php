@extends('layouts.dashboard')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bienvenido a nuestro coworking!</h6>
    </div>
    <div class="card-body">
        <div class="align-items-center">
            @can('create_booking')
                <p>Reserva tu espacio de trabajo ideal en un solo <a href="{{ route('bookings.index') }}">clic</a>.</p>
            @endcan
            @can('create_room')
                <p>Administra los espacios de trabajo ideales en un solo <a href="{{ route('rooms.index') }}">clic</a>.</p>
            @endcan
            <p>Trabaja donde y cuando quieras. Reserva salas de coworking en cualquier momento.</p>
            <p>Únete a nuestra comunidad y encuentra el espacio perfecto para impulsar tu negocio.</p>
        </div>
    </div>
</div>
@endsection