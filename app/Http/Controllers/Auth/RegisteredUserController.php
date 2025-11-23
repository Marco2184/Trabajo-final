<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // <-- IMPORTANTE: User
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre'    => ['required', 'string', 'max:100'],
            'apellido'  => ['required', 'string', 'max:100'],
            'direccion' => ['nullable', 'string', 'max:200'],
            'telefono'  => ['nullable', 'string', 'max:20'],
            'email'     => ['required', 'string', 'email', 'max:150', 'unique:usuarios,email'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([  
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'direccion' => $request->direccion,
            'telefono'  => $request->telefono,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('home');
    }
}
