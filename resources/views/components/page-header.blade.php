{{--
    Composant : <x-page-header>
    Classe    : App\View\Components\PageHeader
    Props     : $title    (string)      – titre principal H1 de la page (obligatoire)
                $subtitle (string|null) – sous-titre descriptif optionnel [défaut: null]
    Slots     : $slot    – slot par défaut (inutilisé)
                $actions – slot nommé : boutons d'action alignés à droite

    Exemple :
        <x-page-header title="Programmes" subtitle="Gestion des formations.">
            <x-slot name="actions">
                <a href="{{ route('programs.create') }}" class="btn-primary">Nouveau</a>
            </x-slot>
        </x-page-header>
--}}

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
