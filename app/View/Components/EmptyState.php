<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;


class EmptyState extends Component
{
    /**
     * @param  string       $message      Texte descriptif affiché sous l'icône.
     * @param  string|null  $actionLabel  Libellé du bouton d'action principal.
     *                                   Si null, le bouton est masqué.
     * @param  string       $actionUrl    URL cible du bouton d'action.
     */
    public function __construct(
        public readonly string  $message     = 'Aucun enregistrement trouvé.',
        public readonly ?string $actionLabel = null,
        public readonly string  $actionUrl   = '#',
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.empty-state');
    }
}
