<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('admin.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validar nombre y email primero
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'email.unique' => 'Este email ya está en uso.',
        ]);

        // Si se intenta cambiar la contraseña
        if ($request->filled('new_password')) {
            // Validar que se haya enviado la contraseña actual
            $request->validate([
                'current_password' => 'required',
            ], [
                'current_password.required' => 'La contraseña actual es requerida para cambiar la contraseña.',
            ]);

            // Verificar contraseña actual
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.'])->withInput();
            }

            // Validar la nueva contraseña solo si la actual es correcta
            $request->validate([
                'new_password' => 'min:6|confirmed',
            ], [
                'new_password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
                'new_password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('admin.profile.show')->with('success', 'Perfil actualizado correctamente.');
    }
} 