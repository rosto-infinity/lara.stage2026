<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant lien de navigation (nav-link).
 *
 * Lien stylisé pour la barre latérale ou le menu de navigation.
 * L'état actif est géré par la propriété $active qui applique
 * un style de surbrillance rouge (couleur primaire du projet).
 *
 * Ce composant supporte un slot nommé $icon pour afficher
 * une icône SVG à gauche du libellé.
 *
 * Utilisation Blade :
 * ─────────────────────────────────────────────────────────────
 *   {{-- Sans icône --}}
 *   <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
 *       Tableau de bord
 *   </x-nav-link>
 *
 *   {{-- Avec icône (slot nommé) --}}
 *   <x-nav-link href="{{ route('students.index') }}" :active="$isActive">
 *       <x-slot name="icon">
 *           <x-heroicon-o-user-group class="w-5 h-5" />
 *       </x-slot>
 *       Étudiants
 *   </x-nav-link>
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/nav-link.blade.php
 */
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
