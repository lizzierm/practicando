@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Inicio')

@section('content_header')
<h1>Todo sobre nosotros</h1>
@stop

@section('content')
<p>Bienvenido a nuestra página web ---contenido</p>

<h5>Usuarios</h5>

<div>
    <div class="card-blok">
        @php
        use App\models\User;
        $cant_usuarios = User::count();
        @endphp
        <h2 class="text-right"><i class="fa fa-users fa-left"></i><span>{{$cant_usuarios}}</span></h2>
        <p class="m-b-0 text-right"><a href="/usuarios" class="text-black">Ver más</a></p>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
    )
</script>
@stop
