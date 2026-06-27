<div class="flex items-start justify-between mb-6">

    {{-- Bloc titre + sous-titre --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>

        {{-- Sous-titre optionnel --}}
        @if($subtitle)
            <p class="mt-1 text-sm text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>

    {{-- Slot d'actions (boutons) — rendu uniquement si le slot est fourni --}}
    @isset($actions)
        <div class="flex items-center gap-2 ml-4">
            {{ $actions }}
        </div>
    @endisset

</div>
