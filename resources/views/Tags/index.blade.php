@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tags</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tags</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                    <a href="{{ url('tags/registrar') }}" class="btn btn-primary mb-3 float-right shadow">Nuevo Tag</a>
                </div>
            </div>

            @include('includes.alertas')

            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>
                                    @if ($item->estado == true)
                                    <span class="badge badge-success">Activo</span>
                                    @else
                                    <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{ $item->usuario->name }}</td>
                                <td>
                                    <a href="{{ url('/tags/actualizar/' . $item->id) }}" class="btn btn-warning sm">
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($item->estado == true)
                                    <a href="{{ url('/tags/estado/' . $item->id) }}" class="btn btn-danger sm">
                                        <i class="fas fa-ban"></i>
                                        </a>
                                    @else
                                    <a href="{{ url('/tags/estado/' . $item->id) }}" class="btn btn-primary sm">
                                        <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tags->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
