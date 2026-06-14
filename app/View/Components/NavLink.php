<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;


class NavLink extends Component
{
    /**
     * @param  string  $href    URL cible du lien.
     * @param  bool    $active  Vrai si le lien correspond à la page courante.
     *                          Applique le style "actif" (fond rouge pâle, texte rouge).
     */
    public function __construct(
        public readonly string $href   = '#',
        public readonly bool   $active = false,
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.nav-link');
    }
}
