<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant carte statistique (stat-card).
 *
 * Affiche une métrique clé avec un label descriptif et une valeur mise en valeur.
 * Supporte un slot nommé $icon pour afficher une icône dans un carré gris.
 * La couleur de la valeur est personnalisable pour attirer l'attention sur des seuils.
 *
 * Utilisation Blade — minimal :
 * ─────────────────────────────────────────────────────────────
 *   <x-stat-card label="Total étudiants" :value="$count" />
 * ─────────────────────────────────────────────────────────────
 *
 * Utilisation Blade — avec icône et couleur :
 * ─────────────────────────────────────────────────────────────
 *   <x-stat-card label="Inscrits" :value="$totalStudents" color="green">
 *       <x-slot name="icon">
 *           <x-heroicon-o-users class="w-5 h-5" />
 *       </x-slot>
 *   </x-stat-card>
 * ─────────────────────────────────────────────────────────────
 *
 * Couleurs disponibles : 'gray' (défaut), 'red', 'green', 'amber'
 *
 * @see resources/views/components/stat-card.blade.php
 */
class StatCard extends Component
{
    /**
     * Classes CSS de couleur pour la valeur numérique.
     *
     * Tailwind nécessite que les classes soient écrites en dur (safelist implicite).
     */
    private const VALUE_COLORS = [
        'red'   => 'text-red-600',
        'gray'  => 'text-gray-900',
        'green' => 'text-green-700',
        'amber' => 'text-amber-700',
    ];

    /**
     * Classe CSS résolue pour la couleur de la valeur.
     * Exposée à la vue Blade via $valueColor.
     */
    public readonly string $valueColor;

    /**
     * @param  string       $label  Libellé descriptif de la métrique (ex : "Total inscrits").
     * @param  int|string   $value  Valeur numérique ou textuelle à afficher en grand.
     * @param  string       $color  Couleur de la valeur : 'gray' | 'red' | 'green' | 'amber'.
     *                              Par défaut 'gray'. Valeur inconnue → 'gray'.
     */
    public function __construct(
        public readonly string $label,
        public readonly int|string $value,
        public readonly string $color = 'gray',
    ) {
        $this->valueColor = self::VALUE_COLORS[$color] ?? self::VALUE_COLORS['gray'];
    }

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.stat-card');
    }
}
