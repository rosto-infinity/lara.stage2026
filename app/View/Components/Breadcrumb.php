<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

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
