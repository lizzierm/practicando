
@extends('adminlte::page')
{{-- titulo de la pagina  --}}
@section('title', 'Inicio')

@section('content_header')
    <h1>Editar usuario</h1>
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
    {!! Form::model($user, ['method'=> 'PUT', 'route' => ['usuarios.update', $user->id]])!!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">E-mail</label>
                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Password</label>
                    
                    {!! Form::text('password', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Confirmar Password</label>
                    {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Roles</label>
                    
                    {!! Form::select('roles[]', $roles,$userRole, array('class'=>'form-control'))!!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>

        </div>
    {!! Form::close()!!}



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

