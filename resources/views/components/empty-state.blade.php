<div class="flex flex-col items-center justify-center py-16 text-center">

    {{-- Icône illustrative : archive/boîte vide --}}
    <div class="w-12 h-12 bg-gray-100 rounded-md flex items-center justify-center mb-3" aria-hidden="true">
        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"/>
        </svg>
    </div>

    {{-- Message descriptif --}}
    <p class="text-sm text-gray-500">{{ $message }}</p>

    {{-- Bouton d'action primaire (optionnel) --}}
    @if($actionLabel)
        <a href="{{ $actionUrl }}"
           class="mt-4 inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
            {{-- Icône "+" --}}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            {{ $actionLabel }}
        </a>
    @endif

</div>
