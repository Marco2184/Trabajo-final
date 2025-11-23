<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q'));

        $telefonos = Telefono::when($q, function ($query) use ($q) {
                $query->where('modelo', 'like', "%{$q}%")
                      ->orWhere('marca', 'like', "%{$q}%");
            })
            ->orderBy('marca')
            ->orderBy('modelo')
            ->get();

        return view('telefonos.index', compact('telefonos', 'q'));
    }

    public function show($id)
    {
        $tel = Telefono::findOrFail($id);
        return view('telefonos.show', compact('tel'));
    }
}
