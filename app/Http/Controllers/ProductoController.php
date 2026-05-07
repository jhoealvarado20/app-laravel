<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all(); // Trae todo de la base de datos
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all(); // Traes todas las categorías
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
        'nombre' => 'required|max:255',
        'precio' => 'required|numeric',
        'stock'  => 'required|integer',
        'category_id' => 'required|exists:categories,id', // Validación de seguridad
        ]);

        // Guardamos en la base de datos
        \App\Models\Producto::create($request->all());

        // Redireccionamos al index con un mensaje
        return redirect()->route('productos.index')->with('success', '¡Producto creado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        // Muestra el formulario con los datos del producto
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // Valida y actualiza
        $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Borra el registro de la base de datos
        $producto->delete();

        // Redirige al index para ver la lista actualizada
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
