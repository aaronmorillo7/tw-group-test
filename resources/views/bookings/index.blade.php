@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Reservas</h1>
    @can('create_booking')
        <div class="d-flex justify-content-end pb-2">
            <a href="{{ route('bookings.create.index') }}" class="btn btn-primary">Crear</a>
        </div>
    @endcan

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Reservas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sala</th>
                            @can('update_bookings')
                                <th>Cliente</th>
                            @endcan
                            <th>Fecha/Hora</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($bookings) > 0)
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->room ? $booking->room->name : 'N/D' }}</td>
                            @can('update_bookings')
                                <td>{{ $booking->user ? $booking->user->first_name . ' ' . $booking->user->last_name : 'N/D' }}</td>
                            @endcan
                            <td>{{ $booking->start_date }}</td>
                            <td>
                                @if($booking->status == 'approved')
                                    <span class="text-success">Aceptada</span>
                                    <span class="bg-success rounded-circle text-white p-2">
                                        <i class="bi bi-check-lg"></i>
                                    </span>

                                @elseif($booking->status == 'pending')
                                    <span class="text-warning">Pendiente</span>
                                    <span class="bg-warning rounded-circle text-white p-2">
                                        <i class="bi bi-clock"></i>
                                    </span>
                                @else
                                    <span class="text-danger">Rechazada</span>
                                    <span class="bg-danger rounded-circle text-white p-2">
                                        <i class="bi bi-x-lg"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                                @can('update_bookings')
                                    @if($booking->status == 'pending')
                                        <div class="btn-group">
                                            <form action="{{ route('bookings.update.status', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input id="status" name="status" type="hidden" value="accepted">
                                                <button type="submit" class="btn btn-success text-white">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('bookings.update.status', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input id="status" name="status" type="hidden" value="rejected">
                                                <button type="submit" class="btn btn-danger text-white">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        Ninguna acción por hacer!
                                    @endif
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="100%">
                                <p class="text-center my-2">No se han encontrado reservas.</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection