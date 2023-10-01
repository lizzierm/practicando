@extends('adminlte::page')

@section('title', 'articulos')

@section('content_header')
<h1>Lista de Articulos</h1>
@stop
{{-- seccion deonde va el contenido --}}
@section('content')

<a href="articulos/create" class="btn btn-primary">CREAR</a>

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <!-- Contenido de tu tabla -->
    <thead class="p-3 mb-2 bg-primary text-white">
        
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->codigo}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->cantidad}}</td>
            <td>{{$articulo->precio}}</td>

            <td>
                <form action="{{route ('articulos.destroy',$articulo->id)}}" method="POST">
                    <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
{{-- <script>
    console.log('Hi!'); 
</script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#articulos');
  
</script>
@stop