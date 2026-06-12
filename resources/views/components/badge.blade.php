{{--
    Composant : <x-badge>
    Classe    : App\View\Components\Badge
    Props     : $color (string) – 'green' | 'gray' | 'red' | 'amber' | 'purple' | 'black'  [défaut: 'gray']
    Variables : $cls (string)   – classes CSS résolues par la classe PHP
    Slot      : $slot           – texte du badge

    Exemple : <x-badge color="green">Actif</x-badge>
--}}

<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $cls }}">
    {{ $slot }}
</span>
