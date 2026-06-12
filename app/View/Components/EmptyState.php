<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant état vide (empty state).
 *
 * Affiché lorsqu'une liste ou un tableau ne contient aucun enregistrement.
 * Optionnellement, un bouton d'action primaire peut être ajouté pour inviter
 * l'utilisateur à créer le premier enregistrement.
 *
 * Utilisation Blade — basique :
 * ─────────────────────────────────────────────────────────────
 *   <x-empty-state />
 *   {{-- Affiche "Aucun enregistrement trouvé." --}}
 * ─────────────────────────────────────────────────────────────
 *
 * Utilisation Blade — avec action :
 * ─────────────────────────────────────────────────────────────
 *   <x-empty-state
 *       message="Aucun étudiant inscrit pour le moment."
 *       actionLabel="Inscrire un étudiant"
 *       actionUrl="{{ route('students.create') }}"
 *   />
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/empty-state.blade.php
 */
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
