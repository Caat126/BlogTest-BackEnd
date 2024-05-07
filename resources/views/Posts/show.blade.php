@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-end">
                                <a href="{{ url('/posts') }}" class="btn btn-primary">Volver al listado</a>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <b>Usuario:</b> {{ $post->usuario->name }}
                                    <br>
                                    <b>Estado:</b> {{ ($post->estado == true) ? 'Publicado' : 'No publicado' }}
                                </div>
                                <div class="col-md-6">
                                    <b>Fecha de publicacion:</b> {{ $post->fecha_publicacion }}
                                    <br>
                                    <b>Fecha de creacion:</b> {{ $post->created_at }}
                                </div>
                            </div> <hr>
                            <div class="text-center">
                                  <h3>{{ $post->titulo }}</h3>
                                  <img src="{{ $post->getImagenUrl() }}" alt="" class="border" height="250px">
                            </div>
                            <div class="mt-3">
                                <h4>Resumen:</h4>
                                {{ $post->resumen }}
                            </div>
                            <div class="mt-3">
                                <h4>Contenido:</h4>
                                <p align="justify">
                                    {!! $post->contenido !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md 4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Comentarios del post</h3>
                            <table class="table table-borderless">
                                @foreach ($post->comentarios as $com)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <b>Usuario:</b> {{ $com->usuario->name }}
                                                </div>
                                                <div class="col-md-6">
                                                    {{ $com->fecha}}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    {{ $com->comentario }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
