<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\UserService;

class UserServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener usuarios y productos existentes
        $users = User::where('role', 'user')->get();
        $products = Product::all();

        if ($users->count() > 0 && $products->count() > 0) {
            // Crear algunos servicios contratados para usuarios
            foreach ($users as $user) {
                // Cada usuario contrata 1-2 productos
                $randomProducts = $products->random(rand(1, 2));
                
                foreach ($randomProducts as $product) {
                    UserService::create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'service_type' => 'purchase',
                        'price' => $product->price,
                        'status' => 'active',
                        'purchased_at' => now()->subDays(rand(1, 30)),
                        'expires_at' => now()->addDays(rand(30, 365)),
                        'notes' => 'Servicio contratado por ' . $user->name,
                    ]);
                }
            }
        }
    }
}
