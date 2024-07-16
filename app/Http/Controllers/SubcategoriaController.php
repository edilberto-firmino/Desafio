<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function store(Request $request, $categoria_id)
    {
        $categoria = Categoria::findOrFail($categoria_id);

        $request->validate([
            'nome' => 'required',
        ]);

        $subcategoria = new Subcategoria([
            'nome' => $request->nome,
        ]);

        $categoria->subcategorias()->save($subcategoria);

        return response()->json($subcategoria, 201);
    }

    public function index($categoria_id)
    {
        $categoria = Categoria::findOrFail($categoria_id);
        $subcategorias = $categoria->subcategorias;

        return response()->json($subcategorias);
    }

    public function show($categoria_id, $subcategoria_id)
    {
        $subcategoria = Subcategoria::where('categoria_id', $categoria_id)
                                    ->findOrFail($subcategoria_id);

        return response()->json($subcategoria);
    }

    public function update(Request $request, $categoria_id, $subcategoria_id)
    {
        $subcategoria = Subcategoria::where('categoria_id', $categoria_id)
                                    ->findOrFail($subcategoria_id);

        $request->validate([
            'nome' => 'required',
        ]);

        $subcategoria->update($request->all());

        return response()->json($subcategoria, 200);
    }

    public function destroy($categoria_id, $subcategoria_id)
    {
        $subcategoria = Subcategoria::where('categoria_id', $categoria_id)
                                    ->findOrFail($subcategoria_id);
        $subcategoria->delete();

        return response()->json(null, 204);
    }
}