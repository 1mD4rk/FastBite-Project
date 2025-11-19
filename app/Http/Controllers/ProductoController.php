<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::withTrashed()->with('categoriaRelacion')->get();
        $categorias = Categoria::all();
        return view('fastbite', compact('productos', 'categorias'));
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
        //

        $validated = $request->validate([
        'nombre' => 'required|string|min:2|max:100|regex:/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/',
        'descripcion' => 'nullable|string|max:500',
        'precio' => 'required|numeric|min:0.01|max:9999.99',
        'categoria' => 'required|exists:categorias,id',
        'imagen' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120', // 5MB
    ], [
        'nombre.required' => 'El nombre del producto es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
        'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'descripcion.required' => 'La descripción no puede exceder los 500 caracteres.',
        'descripcion.max' => 'La descripción es obligatorio.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser un número válido.',
        'precio.min' => 'El precio debe ser al menos $0.01.',
        'precio.max' => 'El precio no puede exceder $9999.99.',
        'categoria.required' => 'La categoría es obligatoria.',
        'categoria.exists' => 'La categoría seleccionada no es válida.',
        'imagen.image' => 'El archivo debe ser una imagen válida.',
        'imagen.mimes' => 'Solo se permiten archivos PNG, JPG, JPEG y WEBP.',
        'imagen.max' => 'La imagen no puede pesar más de 5MB.',
    ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

         Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('fastbite')->with('success', 'Producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'categoria' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120'
        ]);

        $imagenPath = $producto->imagen;
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($imagenPath && \Storage::disk('public')->exists($imagenPath)) {
                \Storage::disk('public')->delete($imagenPath);
            }
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('fastbite')->with('success', 'Producto actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('fastbite')->with('success', 'Producto desactivado exitosamente!');
    }

    /**
     * Restaurar producto desactivado.
     */
    public function restore($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();
        
        return redirect()->route('fastbite')->with('success', 'Producto activado exitosamente!');
    }

    /**
     * Eliminación permanente.
     */
    public function forceDelete($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        
        // Eliminar imagen si existe
        if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen)) {
            \Storage::disk('public')->delete($producto->imagen);
        }
        
        $producto->forceDelete();
        
        return redirect()->route('fastbite')->with('success', 'Producto eliminado permanentemente!');
    }
}
