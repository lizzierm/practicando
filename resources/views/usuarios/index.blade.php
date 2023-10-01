
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Usuarios</h1>
    <a class="btn btn-warning" href="{{route('usuarios.create')}}">Nuevo</a>
  
@stop

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            {{-- lo que tendra la tabla --}}
            <th style="display: none;">ID</th>
            <th style="color: #fff;">ID</th>
            <th style="color: #fff;">Nombre</th>
            <th style="color: #fff;">E-mail</th>
            <th style="color: #fff;">Rol</th>
            <th style="color: #fff;">Acciones</th>
        </thead>
        <tbody>
            {{-- lo importante  $usuarios es del compact de usuariocontroller--}}
            @foreach ($usuarios as $usuario)
                <tr>
                    {{-- $usuario es del foreach que lo combirtio de $usuarios --}}
                    <td style="display: none;">{{$usuario->id}}</td>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td> 
                        @if(!@empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolName )
                                <h5><span class="bagde bagde-dark">{{$rolName}}</span></h5>
                            @endforeach   
                        {{-- @endempty --}}
                        @endif 
                    </td>
                    <td>
                        @can('editar-usuario')
                        <a class="btn btn-info" href="{{route('usuarios.edit', ['usuario' => $usuario->id])}}">Editar</a>
                        @endcan

                        @csrf
                        {{-- @method('DELETE') --}}
                        @can('borrar-usuario')
                        {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy',$usuario->id], 'style'=>'display:inline'])!!}
                            {!! Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>       
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {!! $usuarios->links()!!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

