@extends('adminlte::page')
{{-- titulo de la pagina  --}}
@section('title', 'Inicio')

@section('content_header')
    <h1>Crear nuevo usuario</h1>
@stop

@section('content')
{{-- CONTENIDO control de errores--}}
    @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>¡Revise los campos!</strong>
        @foreach ($errors->all() as $error)
            <span class="badge badge-danger">{{$error}}</span>

   
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- aqui realizamos el formulario para añadir nuevo usuario mas el rol formulario --}}
    {!! Form::open(array('route'=>'roles.store', 'method'=>'POST'))!!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre del Rol:</label>
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Permisos para este Rol:</label>
                    <br />
                    @foreach ($permission as $value)
                    <label>{{Form::checkbox('permission[]',$value->id, false, array('class'=>'name'))}}
                        {{$value->name}}</label>
                    <br />
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        {!! Form::close()!!}
           
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop

