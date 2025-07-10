<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener usuarios y productos existentes
        $user = User::where('email', 'user@mail.com')->first();
        $products = Product::all();

        if ($user && $products->count() > 0) {
            // Crear algunas órdenes de ejemplo
            $orders = [
                [
                    'user_id' => $user->id,
                    'product_id' => $products->first()->id,
                    'total_amount' => $products->first()->price,
                    'status' => 'completed',
                    'order_date' => Carbon::now()->subDays(5),
                    'notes' => 'Sesión de tarot muy satisfactoria',
                ],
                [
                    'user_id' => $user->id,
                    'product_id' => $products->skip(1)->first()->id,
                    'total_amount' => $products->skip(1)->first()->price,
                    'status' => 'pending',
                    'order_date' => Carbon::now()->subDays(2),
                    'notes' => 'Carta natal pendiente de análisis',
                ],
            ];

            foreach ($orders as $orderData) {
                Order::updateOrCreate(
                    [
                        'user_id' => $orderData['user_id'],
                        'product_id' => $orderData['product_id'],
                        'order_date' => $orderData['order_date'],
                    ],
                    $orderData
                );
            }
        }
    }
}
