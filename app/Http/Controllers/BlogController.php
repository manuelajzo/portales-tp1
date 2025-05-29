<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog');
    }

    public function show($slug)
    {
        // Por ahora, datos de ejemplo
        $posts = [
            'lectura-de-tarot' => [
                'title' => 'Lectura de Tarot para Principiantes',
                'image' => '/img/tarot.jpg',
                'content' => 'El Tarot es una herramienta poderosa para la introspección y el autoconocimiento. 
                            En esta guía básica, aprenderás los fundamentos para empezar a leer el tarot...'
            ],
            'poder-cristales' => [
                'title' => 'El Poder Sanador de los Cristales',
                'image' => '/img/cristales.jpg',
                'content' => 'Los cristales han sido utilizados durante milenios por sus propiedades curativas. 
                            Cada cristal tiene características únicas que pueden ayudarnos en diferentes aspectos...'
            ],
            'carta-astral' => [
                'title' => 'Introducción a la Carta Astral',
                'image' => '/img/astrologia.jpg',
                'content' => 'La carta astral es un mapa del cielo en el momento de tu nacimiento. 
                            Es una herramienta poderosa para entender tus tendencias y potenciales...'
            ]
        ];

        if (!isset($posts[$slug])) {
            abort(404);
        }

        return view('blog.show', $posts[$slug]);
    }
}
