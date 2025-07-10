<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = User::with('orders.product')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified user with their orders
     */
    public function show(User $user)
    {
        $user->load('orders.product');
        return view('admin.users.show', compact('user'));
    }
}
