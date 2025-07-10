<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                // Acepta .com, .com.ar, .org, .net, .edu, .gov, .info, .es, .ar
                'regex:/^[^@]+@[^@]+\.(com(\.ar)?|org|net|edu|gov|info|es|ar)$/i'
            ],
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe tener un formato válido',
            'email.unique' => 'Este email ya está registrado',
            'email.regex' => 'El email debe terminar en un dominio válido como .com, .com.ar, .org, .net, etc.',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Por defecto todos los registros son usuarios comunes
        ]);

        // Auto login después del registro
        Auth::login($user);

        return redirect()->route('user.dashboard')
            ->with('success', '¡Bienvenido! Tu cuenta ha sido creada exitosamente.');
    }
}
