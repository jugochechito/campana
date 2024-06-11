<!-- resources/views/admin/noticias/edit.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Noticia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo', $noticia->titulo) }}">
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" class="form-control" id="contenido">{{ old('contenido', $noticia->contenido) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" id="imagen">
            @if ($noticia->imagen)
                <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
