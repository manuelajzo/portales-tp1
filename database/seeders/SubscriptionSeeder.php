<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@mail.com')->first();
        $product = Product::where('name', 'Carta Natal Completa')->first();

        if ($user && $product) {
            Subscription::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'start_date' => now(),
                'status' => 'active',
            ]);
        }
    }
}
