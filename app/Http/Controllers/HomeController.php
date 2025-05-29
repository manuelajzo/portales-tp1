<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener productos destacados
        $featuredProducts = Product::take(3)->get();
        
        // Obtener últimos posts del blog
        $latestPosts = BlogPost::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Servicios disponibles
        $services = [
            [
                'title' => 'Tarot',
                'description' => 'Descubre tu destino a través de las cartas del tarot. Lecturas personalizadas para guiarte en tu camino.',
                'image' => 'img/tarot.jpg',
                'icon' => 'bi-stars'
            ],
            [
                'title' => 'Carta Natal',
                'description' => 'Análisis detallado de tu carta natal para entender mejor tu personalidad y tu destino.',
                'image' => 'img/cartanatal.webp',
                'icon' => 'bi-moon-stars'
            ],
            [
                'title' => 'Cristales',
                'description' => 'Encuentra el cristal perfecto para armonizar tu energía y alcanzar tus objetivos.',
                'image' => 'img/cristales.jpg',
                'icon' => 'bi-gem'
            ]
        ];

        return view('home', compact('featuredProducts', 'latestPosts', 'services'));
    }
}
