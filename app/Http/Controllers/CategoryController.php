<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\Category::all(); // Esto trae todo de la tabla
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar que el nombre sea obligatorio y único
        $request->validate([
            'nombre' => 'required|unique:categories|max:255',
        ]);

        // 2. Crear la categoría en la BD
        \App\Models\Category::create([
            'nombre' => $request->nombre,
            'slug' => \Illuminate\Support\Str::slug($request->nombre),
            'description' => $request->description,
        ]);

        // 3. Redirigir a la lista con un mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Busca la categoría
        return view('categories.edit', compact('category')); // Retorna la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validar los datos
        $request->validate([
            'nombre' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);

        // 2. Buscar la categoría
        $category = Category::findOrFail($id);

        // 3. Actualizar
        $category->update([
            'nombre' => $request->nombre,
            'description' => $request->description,
            // Si usas slugs, podrías actualizarlo aquí también
        ]);

        // 4. Redirigir (¡ESTO ES LO QUE FALTA SI NO PASA NADA!)
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        // 1. Encontrar la categoría
        $category = Category::findOrFail($id);

        // 2. Eliminarla
        $category->delete();

        // 3. Redirigir a la lista con un mensaje
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
