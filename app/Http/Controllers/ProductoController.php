<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return new ProductoCollection(Producto::where('disponible', 1)->orderBy('id', 'DESC')->get());
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->disponible = 0;
        $producto->save();

        return response()->json([
            'message' => 'Producto actualizado correctamente'
        ]);
    }
}
