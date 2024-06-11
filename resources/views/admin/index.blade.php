<!-- resources/views/admin/noticias/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Noticias</h1>
    <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary">Agregar Noticia</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->id }}</td>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->contenido }}</td>
                    <td><img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" width="100"></td>
                    <td>
                        <a href="{{ route('admin.noticias.edit', $noticia) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.noticias.destroy', $noticia) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
