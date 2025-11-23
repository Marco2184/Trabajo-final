<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Telefono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $items = Carrito::with('telefono')
            ->where('id_usuario', Auth::user()->id_usuario)
            ->get();

        $total = 0;

        foreach ($items as $item) {
            $item->subtotal = $item->telefono->precio * $item->cantidad;
            $total += $item->subtotal;
        }

        return view('carrito.index', compact('items', 'total'));
    }

    public function add(Request $request, $idTelefono)
    {
        $telefono = Telefono::findOrFail($idTelefono);
        $request->validate([
            'cantidad' => 'required|integer|min:1|max:' . $telefono->stock,
        ]);

        $cant = (int) $request->cantidad;
        $item = Carrito::firstOrNew([
            'id_usuario'  => Auth::user()->id_usuario,
            'id_telefono' => $telefono->id_telefono,
        ]);

        $item->cantidad = ($item->exists ? $item->cantidad : 0) + $cant;
        $item->save();
        $telefono->stock -= $cant;
        $telefono->save();

        return back()->with('success', 'Producto agregado al carrito');
    }
    public function removeUnits(Request $request, $idCarrito)
    {
        $item = Carrito::with('telefono')
            ->where('id_usuario', Auth::user()->id_usuario)
            ->findOrFail($idCarrito);

        $max = $item->cantidad; 

        $request->validate([
            'cantidad' => ['required', 'integer', 'min:1', "max:{$max}"],
        ]);

        $cant = (int) $request->cantidad;

        $telefono = $item->telefono;
        $telefono->stock += $cant;
        $telefono->save();
        if ($cant >= $item->cantidad) {
            $item->delete();
        } else {
            $item->cantidad -= $cant;
            $item->save();
        }

        return redirect()->route('carrito.index')
            ->with('success', 'Cantidad eliminada del carrito');
    }
    public function remove($idCarrito)
    {
        $item = Carrito::with('telefono')
            ->where('id_usuario', Auth::user()->id_usuario)
            ->findOrFail($idCarrito);

        $telefono = $item->telefono;
        $telefono->stock += $item->cantidad;
        $telefono->save();

        $item->delete();

        return redirect()->route('carrito.index')
            ->with('success', 'Producto eliminado del carrito');
    }
}
