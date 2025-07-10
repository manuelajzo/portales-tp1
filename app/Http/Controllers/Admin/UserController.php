<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Controlador para administrar usuarios desde el panel de administración.
 */
class UserController extends Controller
{
    /**
     * Muestra una lista de usuarios con sus órdenes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('orders.product')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Muestra el detalle de un usuario específico con sus órdenes.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        $user->load('orders.product');
        return view('admin.users.show', compact('user'));
    }
}
