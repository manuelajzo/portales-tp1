<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Lectura de Tarot para Principiantes',
                'content' => 'El tarot es una herramienta poderosa para la introspección y el autoconocimiento. En este artículo, exploraremos los conceptos básicos de la lectura del tarot, incluyendo la estructura del mazo, los significados fundamentales de los arcanos mayores y menores, y cómo realizar una lectura simple para ti mismo.',
                'category' => 'Tarot',
                'image' => 'img/tarot.jpg',
                'short_description' => 'Descubre los secretos básicos para empezar a leer el tarot y conectar con tu intuición.',
            ],
            [
                'title' => 'El Poder Sanador de los Cristales',
                'content' => 'Los cristales han sido utilizados durante milenios por sus propiedades curativas y energéticas. Aprenderemos sobre los cristales más comunes, sus propiedades específicas, cómo limpiarlos y programarlos, y las mejores formas de incorporarlos en tu práctica espiritual diaria.',
                'category' => 'Cristales',
                'image' => 'img/cristales.jpg',
                'short_description' => 'Aprende sobre las propiedades curativas de los cristales más populares y cómo utilizarlos.',
            ],
            [
                'title' => 'Introducción a la Carta Astral',
                'content' => 'La carta astral es un mapa del cielo en el momento de tu nacimiento. Este artículo te guiará a través de los elementos básicos de una carta astral, incluyendo los planetas, las casas astrológicas, los signos zodiacales y cómo estos elementos se interrelacionan para crear tu perfil astrológico único.',
                'category' => 'Astrología',
                'image' => 'img/astrologia.jpg',
                'short_description' => 'Comprende los elementos básicos de una carta astral y su significado en tu vida.',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'content' => $post['content'],
                'category' => $post['category'],
                'image' => $post['image'],
                'short_description' => $post['short_description'],
                'is_published' => true,
                'published_at' => now(),
            ]);
        }
    }
}
