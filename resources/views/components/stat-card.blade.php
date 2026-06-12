{{--
    Composant : <x-stat-card>
    Classe    : App\View\Components\StatCard
    Props     : $label      (string)         – libellé de la métrique (ex: "Total étudiants")
                $value      (int|string)     – valeur numérique ou textuelle affichée en grand
                $color      (string)         – couleur de la valeur : 'gray' | 'red' | 'green' | 'amber' [défaut: 'gray']
    Variables : $valueColor (string)         – classe CSS résolue par la classe PHP
    Slots     : $icon       – slot nommé : icône SVG optionnelle dans le carré gris

    Exemple :
        <x-stat-card label="Inscrits" :value="$totalStudents" color="green">
            <x-slot name="icon">
                <x-heroicon-o-users class="w-5 h-5" />
            </x-slot>
        </x-stat-card>
--}}

<div class="rounded-md border border-gray-200 bg-white px-5 py-4 flex items-center gap-4">

    {{-- Icône optionnelle dans un carré gris (slot nommé $icon) --}}
    @isset($icon)
        <div class="w-9 h-9 rounded-md bg-gray-100 flex items-center justify-center shrink-0 text-gray-500" aria-hidden="true">
            {{ $icon }}
        </div>
    @endisset

    {{-- Bloc label + valeur --}}
    <div>
        {{-- Label : texte petit, majuscules, espacé --}}
        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">{{ $label }}</p>

        {{-- Valeur : grande, colorée selon $color --}}
        <p class="text-2xl font-bold {{ $valueColor }} mt-0.5">{{ $value }}</p>
    </div>

</div>
