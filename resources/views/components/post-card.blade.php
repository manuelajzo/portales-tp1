@props(['title', 'image', 'description', 'link'])

<article class="bg-white rounded-xl shadow-md overflow-hidden transform hover:-translate-y-1 transition-all duration-300 hover:shadow-xl">
    <a href="{{ $link }}" class="block h-full">
        <div class="relative">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-56 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        
        <div class="p-6">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 line-clamp-2">
                    {{ $title }}
                </h2>
                
                <p class="text-gray-600 text-sm line-clamp-3">
                    {{ $description }}
                </p>
            </div>
            
            <div class="flex items-center justify-between">
                <span class="text-indigo-600 font-medium text-sm flex items-center gap-1 hover:text-indigo-800">
                    Leer más 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </div>
        </div>
    </a>
</article> 