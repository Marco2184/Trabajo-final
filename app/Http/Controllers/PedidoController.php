<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $items = Carrito::with('telefono')
            ->where('id_usuario', auth()->user()->id_usuario)
            ->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'El carrito está vacío');
        }

        // verificar stock
        foreach ($items as $it) {
            if ($it->cantidad > $it->telefono->stock) {
                return back()->with('error', 'El stock cambió, ajusta las cantidades.');
            }
        }

        DB::transaction(function () use ($items) {
            $total = $items->sum(fn($i) => $i->cantidad * $i->telefono->precio);

            $pedido = Pedido::create([
                'id_usuario' => auth()->user()->id_usuario,
                'total'      => $total,
                'estado'     => 'Pendiente',
            ]);

            foreach ($items as $it) {
                DetallePedido::create([
                    'id_pedido'      => $pedido->id_pedido,
                    'id_telefono'    => $it->id_telefono,
                    'cantidad'       => $it->cantidad,
                    'precio_unitario'=> $it->telefono->precio,
                ]);

                $it->telefono->decrement('stock', $it->cantidad);
            }

            Carrito::where('id_usuario', auth()->user()->id_usuario)->delete();
        });

        return redirect()->route('pedidos.historial')
            ->with('ok', 'Pedido registrado correctamente');
    }

    public function historial()
    {
        $pedidos = Pedido::with('detalles.telefono')
            ->where('id_usuario', auth()->user()->id_usuario)
            ->orderByDesc('id_pedido')
            ->get();

        return view('pedidos.historial', compact('pedidos'));
    }
}
