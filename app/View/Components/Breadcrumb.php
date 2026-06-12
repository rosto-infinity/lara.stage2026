<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant fil d'Ariane (breadcrumb).
 *
 * Génère une navigation secondaire hiérarchique (nav > liens > élément actif).
 * Le dernier élément du tableau $items est toujours rendu comme texte simple
 * (sans lien cliquable) pour indiquer la page courante.
 *
 * Structure du tableau $items attendue :
 * ─────────────────────────────────────────────────────────────
 *   [
 *     ['label' => 'Programmes',  'url' => '/programmes'],
 *     ['label' => 'Informatique', 'url' => '/programmes/1'],
 *     ['label' => 'Modifier'],   // dernier élément → pas d'url requise
 *   ]
 * ─────────────────────────────────────────────────────────────
 *
 * Utilisation Blade :
 * ─────────────────────────────────────────────────────────────
 *   <x-breadcrumb :items="[
 *       ['label' => 'Étudiants', 'url' => route('students.index')],
 *       ['label' => $student->full_name],
 *   ]" />
 * ─────────────────────────────────────────────────────────────
 *
 * Rendu HTML :
 *   Accueil › Étudiants › Jean Dupont
 *
 * @see resources/views/components/breadcrumb.blade.php
 */
class Breadcrumb extends Component
{
    /**
     * @param  array<int, array{label: string, url?: string}>  $items
     *         Liste des segments du fil d'Ariane, ordonnés du général au particulier.
     *         La clé 'url' est optionnelle pour le dernier élément.
     */
    public function __construct(
        public readonly array $items = [],
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.breadcrumb');
    }
}
