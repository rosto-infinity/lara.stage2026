<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant en-tête de page (page-header).
 *
 * Affiche le titre principal et le sous-titre optionnel d'une page.
 * Un slot nommé $actions permet d'insérer des boutons d'action
 * (ex : "Créer", "Exporter") alignés à droite du titre.
 *
 * Utilisation Blade — minimal :
 * ─────────────────────────────────────────────────────────────
 *   <x-page-header title="Liste des étudiants" />
 * ─────────────────────────────────────────────────────────────
 *
 * Utilisation Blade — complet :
 * ─────────────────────────────────────────────────────────────
 *   <x-page-header
 *       title="Programmes académiques"
 *       subtitle="Gestion des formations et niveaux d'étude."
 *   >
 *       <x-slot name="actions">
 *           <a href="{{ route('programs.create') }}" class="btn-primary">
 *               Nouveau programme
 *           </a>
 *       </x-slot>
 *   </x-page-header>
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/page-header.blade.php
 */
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
