<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;


class Badge extends Component
{
    /**
     * Palette de couleurs disponibles.
     *
     * Les utilitaires Tailwind sont écrits en dur (pas de concaténation dynamique)
     * pour que PurgeCSS/Tailwind puisse les détecter à la compilation.
     */
    private const COLORS = [
        'green'  => 'bg-green-50 text-green-700 border border-green-200',
        'gray'   => 'bg-gray-100 text-gray-600',
        'red'    => 'bg-red-50 text-red-700 border border-red-200',
        'amber'  => 'bg-amber-50 text-amber-700 border border-amber-200',
        'purple' => 'bg-purple-50 text-purple-700 border border-purple-200',
        'black'  => 'bg-gray-900 text-white',
    ];

    /**
     * Classes CSS résolues, exposées à la vue Blade via $cls.
     */
    public readonly string $cls;

    /**
     * @param  string  $color  Couleur du badge : 'green' | 'gray' | 'red' | 'amber' | 'purple' | 'black'
     *                         Valeur par défaut : 'gray'.
     *                         Toute valeur inconnue est résolue sur 'gray'.
     */
    public function __construct(
        public readonly string $color = 'gray',
    ) {
        $this->cls = self::COLORS[$color] ?? self::COLORS['gray'];
    }

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.badge');
    }
}
