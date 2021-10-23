<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // WILLIAM ALEXIS LAZO VÁSQUEZ 25-1478-2016
    public function crearProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'existencia' => 'required'
        ]);
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'existencia' => $request->existencia
        ]);
        if ($producto != null) {
            return response()->json([
                "error" => "",
                "codigo" => "200",
                "data" => $producto,
            ]);
        } else {
            return response()->json([
                "error" => "Error al crear",
                "codigo" => "500",
                "data" => null,
            ]);
        }
    }
    // WILLIAM ALEXIS LAZO VÁSQUEZ 25-1478-2016
    public function verPrecio($id)
    {
        if ($id == null) {
            return response()->json([
                "error" => "ID requerido",
                "codigo" => "500",
                "data" => null,
            ]);
        }
        $producto = Producto::where('id', $id)->get();


        return response()->json([
            'codigo' => $producto[0]->id,
            'precio' => $producto[0]->precio,
        ]);
    }
}
