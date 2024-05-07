@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            @include('includes.alertas')

            <div class="table-responsive">
                <table class="table table-bordered table-hover shadow text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    {{ $item->created_at }}
                                    <small>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans(now()) }}</small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
