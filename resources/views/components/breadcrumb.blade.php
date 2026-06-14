<nav class="flex items-center gap-1 text-sm text-gray-500" aria-label="Fil d'Ariane">

    {{-- Racine fixe : toujours présente --}}
    <a href="/dashboard" class="hover:text-indigo-600 transition-colors">Accueil</a>

    @foreach($items as $item)
        {{-- Séparateur chevron entre chaque segment --}}
        <svg class="w-3 h-3 text-gray-300 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>

        @if(!$loop->last)
            {{-- Segment intermédiaire → lien cliquable --}}
            <a href="{{ $item['url'] ?? '#' }}" class="hover:text-indigo-600 transition-colors">
                {{ $item['label'] }}
            </a>
        @else
            {{-- Dernier segment → page courante, texte simple (non cliquable) --}}
            <span class="text-gray-800 font-medium" aria-current="page">{{ $item['label'] }}</span>
        @endif
    @endforeach

</nav>
