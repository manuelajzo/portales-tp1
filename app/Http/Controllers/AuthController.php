<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Controlador para manejar la autenticación de usuarios.
 */
class AuthController extends Controller
{
    /**
     * Muestra el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Procesa la autenticación del usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->intended('/admin/posts'); // Ruta admin
        } elseif ($user->isUser()) {
            return redirect()->intended('/user/dashboard'); // Ruta usuario común
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Rol de usuario no válido.',
            ]);
        }
    }

    return back()->withErrors([
        'email' => 'Las credenciales son incorrectas.',
    ])->withInput();
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
