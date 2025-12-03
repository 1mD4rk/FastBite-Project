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
    public function store(Request $request){
    // Determinar qué campos usar según el tipo de producto
    if ($request->tipo_producto === 'con_tamano') {
        $categoriaId = $request->categoria_con_tamano;
        $precio = $request->precio_con;
        $tamano = $request->tamano_con;
        
        // Reglas específicas para "Con Tamaño"
        $rules = [
            'nombre' => 'required|string|min:2|max:100|regex:/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/',
            'descripcion' => 'required|string|max:500',
            'categoria_con_tamano' => 'required|exists:categorias,id',
            'precio_con' => 'required|numeric|min:0.01|max:9999.99',
            'tamano_con' => 'required|string|in:pequenio,mediano,grande,familiar,personal,Pequeño,Mediano,Grande,Familiar,Personal',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120',
        ];
    } else {
        $categoriaId = $request->categoria_sin_tamano;
        $precio = $request->precio_sin;
        $tamano = null;
        
        // Reglas específicas para "Sin Tamaño"
        $rules = [
            'nombre' => 'required|string|min:2|max:100|regex:/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/',
            'descripcion' => 'required|string|max:500',
            'categoria_sin_tamano' => 'required|exists:categorias,id',
            'precio_sin' => 'required|numeric|min:0.01|max:9999.99',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120',
        ];
    }
    
    $validated = $request->validate($rules, [
        'nombre.required' => 'El nombre del producto es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
        'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.max' => 'La descripción no puede exceder los 500 caracteres.',
        'categoria_con_tamano.required' => 'La categoría es obligatoria para productos con tamaño.',
        'categoria_con_tamano.exists' => 'La categoría con tamaño seleccionada no es válida.',
        'categoria_sin_tamano.required' => 'La categoría es obligatoria para productos sin tamaño.',
        'categoria_sin_tamano.exists' => 'La categoría sin tamaño seleccionada no es válida.',
        'precio_con.required' => 'El precio es obligatorio para productos con tamaño.',
        'precio_con.numeric' => 'El precio debe ser un número válido.',
        'precio_con.min' => 'El precio debe ser al menos $0.01.',
        'precio_con.max' => 'El precio no puede exceder $9999.99.',
        'precio_sin.required' => 'El precio es obligatorio para productos sin tamaño.',
        'precio_sin.numeric' => 'El precio debe ser un número válido.',
        'precio_sin.min' => 'El precio debe ser al menos $0.01.',
        'precio_sin.max' => 'El precio no puede exceder $9999.99.',
        'tamano_con.required' => 'El tamaño es obligatorio para este tipo de producto.',
        'tamano_con.in' => 'El tamaño seleccionado no es válido.',
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
        'precio' => $precio,
        'categoria' => $categoriaId,
        'tamano' => $tamano,
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
