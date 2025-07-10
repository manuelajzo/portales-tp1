<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

/**
 * Controlador para manejar las acciones de usuarios autenticados.
 */
class UserController extends Controller
{
    /**
     * Muestra el dashboard del usuario con sus órdenes recientes.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('product')->latest()->take(5)->get();

        return view('user.dashboard', compact('orders'));
    }

    /**
     * Muestra todos los productos disponibles para compra.
     *
     * @return \Illuminate\View\View
     */
    public function products()
    {
        $products = Product::where('is_available', true)->get();

        return view('products', compact('products'));
    }

    /**
     * Muestra el detalle de un producto específico.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\View\View
     */
    public function showProduct(Product $product)
    {
        return view('user.product-detail', compact('product'));
    }

    /**
     * Crea una nueva orden para el usuario autenticado.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrder(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'notes' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Evitar duplicados
        $yaContratado = Order::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if ($yaContratado) {
            return redirect()->back()->with('success', '¡Ya contrataste este servicio!');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'total_amount' => $product->price,
            'status' => 'pending',
            'order_date' => now(),
            'notes' => $request->notes,
        ]);

        // Redirigir según de dónde vino la solicitud
        if ($request->headers->get('referer') && str_contains($request->headers->get('referer'), '/products')) {
            return redirect('/products')->with('success', '¡Orden creada exitosamente! Te contactaremos pronto.');
        }

        return redirect()->route('user.dashboard')
            ->with('success', '¡Orden creada exitosamente! Te contactaremos pronto.');
    }

    /**
     * Muestra el historial de órdenes del usuario.
     *
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        $orders = Auth::user()->orders()->with('product')->latest()->paginate(10);

        return view('user.orders', compact('orders'));
    }

    /**
     * Cancela (elimina) una orden del usuario.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelOrder(Order $order)
    {
        // Solo el dueño puede cancelar su orden
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->delete();

        return redirect()->back()->with('success', '¡Servicio cancelado correctamente!');
    }
}
