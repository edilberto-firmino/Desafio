<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:categorias,nome',
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json($categoria, 201);
    }

    public function index()
    {
        $categorias = Categoria::all();

        return response()->json($categorias);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update($request->all());

        return response()->json($categoria, 200);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(null, 204);
    }
}