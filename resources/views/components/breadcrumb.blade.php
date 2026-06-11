@props(['items' => []])

<nav class="flex items-center gap-1 text-sm text-gray-500">
    <a href="/dashboard" class="hover:text-indigo-600 transition-colors">Accueil</a>

    @foreach($items as $item)
        <svg class="w-3 h-3 text-gray-300 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
        @if(!$loop->last)
            <a href="{{ $item['url'] ?? '#' }}" class="hover:text-indigo-600 transition-colors">
                {{ $item['label'] }}
            </a>
        @else
            <span class="text-gray-800 font-medium">{{ $item['label'] }}</span>
        @endif
    @endforeach
</nav>
