@extends('layout')

@section('content')
<h3>Mis pedidos</h3>

@forelse($pedidos as $p)
    <div class="card mb-3 p-2">
        <div>
            <b>Pedido #{{ $p->id_pedido }}</b> |
            Estado: {{ $p->estado }} |
            Total: S/ {{ number_format($p->total,2) }} |
            Fecha: {{ $p->fecha_pedido }}
        </div>
        <ul class="mt-2">
            @foreach($p->detalles as $d)
                <li>
                    {{ $d->telefono->marca }} - {{ $d->telefono->modelo }}
                    x {{ $d->cantidad }}
                    (S/ {{ number_format($d->precio_unitario,2) }})
                </li>
            @endforeach
        </ul>
    </div>
@empty
    <p>No tienes pedidos registrados.</p>
@endforelse
@endsection
