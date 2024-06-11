<?php

// app/Http/Controllers/Admin/NoticiaController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoticiaRequest;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    public function store(StoreNoticiaRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        Noticia::create($data);

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia creada correctamente.');
    }

    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(StoreNoticiaRequest $request, Noticia $noticia)
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $noticia->update($data);

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
