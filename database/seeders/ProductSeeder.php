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
        // Primero eliminamos el producto antiguo de carta natal si existe
        Product::where('name', 'Carta natal')->delete();

        $products = [
            [
                'name' => 'Lectura de Tarot Personalizada',
                'description' => 'Descubre tu destino a través de las cartas del tarot. Sesión personalizada de 60 minutos donde exploraremos tus preguntas y guiaremos tu camino.',
                'price' => 15000,
                'category' => 'Tarot',
                'image' => 'img/tarot.jpg',
                'is_available' => true
            ],
            [
                'name' => 'Carta Natal Completa',
                'description' => 'Análisis detallado de tu carta natal para entender mejor tu personalidad y tu destino. Incluye informe escrito y sesión de interpretación.',
                'price' => 25000,
                'category' => 'Astrología',
                'image' => 'img/cartanatal.webp',
                'is_available' => true
            ],
            [
                'name' => 'Kit de Cristales para Principiantes',
                'description' => 'Set de cristales esenciales para comenzar tu viaje espiritual. Incluye cuarzo rosa, amatista, turmalina negra y guía de uso.',
                'price' => 12000,
                'category' => 'Cristales',
                'image' => 'img/cristales.jpg',
                'is_available' => true
            ],
            [
                'name' => 'Lectura de Arcanos Mayores',
                'description' => 'Sesión enfocada en los 22 Arcanos Mayores para explorar los grandes temas de tu vida. Duración: 45 minutos.',
                'price' => 12000,
                'category' => 'Tarot',
                'image' => 'img/arcanos-mayores.jpg',
                'is_available' => true
            ]
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                [
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'category' => $product['category'],
                    'image' => $product['image'],
                    'is_available' => $product['is_available'],
                    'updated_at' => Carbon::now()
                ]
            );
        }
    }
}
