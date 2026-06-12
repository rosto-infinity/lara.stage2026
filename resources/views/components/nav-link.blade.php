{{--
    Composant : <x-nav-link>
    Classe    : App\View\Components\NavLink
    Props     : $href   (string) – URL cible du lien           [défaut: '#']
                $active (bool)   – état actif (page courante)  [défaut: false]
    Slots     : $slot           – libellé du lien (texte)
                $icon           – slot nommé, icône SVG optionnelle à gauche

    Exemple :
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <x-slot name="icon"><x-heroicon-o-home class="w-5 h-5" /></x-slot>
            Tableau de bord
        </x-nav-link>
--}}

<a href="{{ $href }}"
   class="flex items-center gap-2.5 px-3 py-2 rounded-md text-sm transition-colors duration-100
          {{ $active
              ? 'bg-red-50 text-red-700 font-medium'      {{-- état actif : rouge pâle --}}
              : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">  {{-- état normal --}}

    {{-- Icône optionnelle (slot nommé $icon) --}}
    @isset($icon)
        <span class="shrink-0 {{ $active ? 'text-red-600' : 'text-gray-400' }}">{{ $icon }}</span>
    @endisset

    {{-- Libellé du lien --}}
    <span>{{ $slot }}</span>
</a>
