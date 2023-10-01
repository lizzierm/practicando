@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
{{--  BOTON DE CREAR----losque tengan permisos podran poner rol --}}
    @can('crear-rol')
        <a class="btn btn-warning" href="{{route('roles.create')}}">Nuevo</a>
    @endcan
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef">
            <th style="color:#fff;">Rol</th>
            <th style="color:#fff;">Acciones</th>
        </thead>
        <tbody>
            @foreach ($roles as $role )
            <tr>
                <td>{{$role->name}}</td>
                <td>
                    {{-- BOTON DE EDITAR --}}
                    @can('editar-rol')
                    <a class="btn btn-primary" href="{{route('roles.edit', $role->id)}}">Editar</a>
                    @endcan
                    @can('borrar-rol')
                    {{-- BOTON DE BORRAR display inline es paraque no se desacomoden los botones --}}
                    {!! Form::open(['method'=>'DELETE', 'route'=>['roles.destroy',$role->id], 'style'=>'display:inline'])!!}
                        {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                    {!! Form::close()!!} 
                    @endcan
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    {{-- ponemos nuestra paginacion --}}
    <div class="pagination justify-content-end">
        {!! $roles->links() !!}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

