    @extends('adminlte::page')
    {{-- titulo de la pagina --}}
    @section('title', 'Inicio')

    @section('content_header')
    <h1>Editar el rol</h1>
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
    {{-- aqui realizamos el formulario para añadir nuevo usuario mas el rol formulario PATH O PUT sonlo mismo metodos para
    actualiza --}}

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
   

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">Nombre del Rol:</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">Permisos para este Rol:</label> 
                    @foreach($permission as $value)
                    <label class="list-group " style=" margin: 10px 20px" </style>

                        {{-- <label class="list-group-item d-flex justify-content-between align-items-center"> --}}
                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'form-check-input']) }}
                        {{ $value->name }}
                    </label>
                    @endforeach
                {{-- </div> --}}
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

