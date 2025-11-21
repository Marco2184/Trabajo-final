<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>PhoneShop</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-3">
<nav class="mb-3 d-flex justify-content-between">
    <div>
        <a href="{{ route('home') }}" class="btn btn-link">Catálogo</a>
        @auth
            <a href="{{ route('carrito.index') }}" class="btn btn-link">Carrito</a>
            <a href="{{ route('pedidos.historial') }}" class="btn btn-link">Mis pedidos</a>
        @endauth
    </div>
    <div>
        @auth
            <span class="me-2">Hola, {{ auth()->user()->nombre }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-danger">Salir</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Ingresar</a>
            <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Registrarse</a>
        @endauth
    </div>
</nav>

@if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@yield('content')
</body>
</html>
