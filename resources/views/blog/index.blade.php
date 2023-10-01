
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Blog</h1>
@stop

@section('content')
{{-- directiva para poder crear realiza permisos --}}
@can('crear-blog')
<a class="btn btn-warning" href="{{route('blog.create')}}">Nuevo</a>
@endcan
    
    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef;">
            {{-- lo que tendra la tabla --}}
            <th style="display: none;">ID</th>
            {{-- <th style="color: #fff;">ID</th> --}}
            <th style="color: #fff;">Titulo</th>
            <th style="color: #fff;">Contenido</th>
            <th style="color: #fff;">Acciones</th>
        </thead>
        <tbody>
            {{-- lo importante  $usuarios es del compact de usuariocontroller--}}
            @foreach ($blogs as $blog)
                <tr>
                    {{-- $usuario es del foreach que lo combirtio de $usuarios --}}
                    <td style="display: none;">{{$blog->id}}</td>
                    {{-- <td>{{$blog->id}}</td> --}}
                    <td>{{$blog->titulo}}</td>
                    <td>{{$blog->contenido}}</td>
                    <td>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                            @can('editar-blog')
                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-info">Editar</a>
                            @endcan
                    
                            @csrf
                            @method('DELETE')
                    {{-- permiso para borrar-blog --}}
                            @can('borrar-blog')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            @endcan
                        </form>
                    
                    </td> 
                </tr> 
            @endforeach

        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {!! $blogs->links()!!}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

