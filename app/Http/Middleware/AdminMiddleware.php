<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware para restringir el acceso solo a administradores.
 */
class AdminMiddleware
{
    /**
     * Maneja una solicitud entrante verificando permisos de administrador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar que esté autenticado
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Verificar que sea admin
        if ((auth()->user()->role ?? '') !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos de administrador');
        }

        return $next($request);
    }
}
