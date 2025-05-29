<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <article class="max-w-4xl mx-auto">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-96 object-cover rounded-lg shadow-lg mb-8">

            <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>

            <div class="prose prose-lg max-w-none">
                {{ $content }}
            </div>

            <div class="mt-8 pt-8 border-t">
                <a href="/blog" class="text-indigo-600 hover:text-indigo-800">
                    ← Volver al blog
                </a>
            </div>
        </article>
    </div>
</x-layout> 