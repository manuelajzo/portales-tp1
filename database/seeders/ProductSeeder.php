<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::updateOrCreate(
            ['name' => 'Carta natal'],
            [
                'image' => 'img/cartanatal.webp',
                'description' => 'Conocé el mapa que revela tu potencial y las lecciones que has venido a aprender.',
                'price' => 50000,
                'category' => 'Astrología',
                'updated_at' => Carbon::now()
            ]
        );
    }
}
