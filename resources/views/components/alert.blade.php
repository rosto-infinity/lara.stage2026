<div class="mx-6 mt-4 px-4 py-3 rounded-md border {{ $cls }} text-sm flex items-center justify-between gap-4">
    {{-- Message principal (slot par défaut) --}}
    <span>{{ $slot }}</span>

    {{-- Bouton de fermeture inline — supprime le nœud DOM parent --}}
    <button onclick="this.parentElement.remove()" class="text-current opacity-50 hover:opacity-100 shrink-0" aria-label="Fermer l'alerte">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
