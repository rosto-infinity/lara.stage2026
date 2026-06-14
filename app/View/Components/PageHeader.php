<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PageHeader extends Component
{
    /**
     * @param  string       $title     Titre principal de la page (balise <h1>).
     * @param  string|null  $subtitle  Texte descriptif facultatif sous le titre.
     */
    public function __construct(
        public readonly string  $title,
        public readonly ?string $subtitle = null,
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.page-header');
    }
}
