@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Todas las salas</h1>
    <div class="d-flex justify-content-end pb-2">
        <a href="{{ route('rooms.create.index') }}" class="btn btn-primary">Crear</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Salas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rooms) > 0)
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->description }}</td>
                            <td>
                                <form class="btn-group" action="{{ route('rooms.delete', $room->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('rooms.update.index', $room->id) }}" class="btn btn-warning rounded-left">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="100%">
                                <p class="text-center my-2">No se han encontrado salas.</p>
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