@extends('adminlte::page')
{{-- titulo de la pagina  --}}
@section('title', 'Inicio')

@section('content_header')
    <h1>Crear nuevo usuario</h1>
@stop

@section('content')

    @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>¡Revise los campos!</strong>
        @foreach ($errors->all() as $error)
            <span class="badge bedge-denger">{{$error}}</span>    
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- aqui realizamos el formulario para añadir nuevo usuario mas el rol formulario --}}
    <form action="{{route('blog.update', $blog->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" value="{{$blog->titulo}}">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" name="contenido" style="height: 100%">{{$blog->contenido}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

