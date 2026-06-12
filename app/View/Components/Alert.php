<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant d'alerte contextuelle (notification bannière).
 *
 * Affiche un bandeau coloré avec un bouton de fermeture inline (JS natif).
 * Supporte quatre niveaux sémantiques : success, error, warning, info.
 *
 * Utilisation Blade :
 * ─────────────────────────────────────────────────────────────
 *   <x-alert type="success">Enregistrement sauvegardé.</x-alert>
 *   <x-alert type="error">Une erreur est survenue.</x-alert>
 *   <x-alert type="warning">Attention, action irréversible.</x-alert>
 *   <x-alert type="info">Informations complémentaires.</x-alert>
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/alert.blade.php
 */
class Alert extends Component
{
    /**
     * Types d'alertes autorisés avec leurs classes Tailwind associées.
     *
     * Chaque entrée mappe un niveau sémantique vers des utilitaires CSS :
     *   - bordure gauche colorée  (border-l-4 + couleur)
     *   - texte coloré            (text-{color}-{shade})
     *   - fond neutre             (bg-white)
     */
    private const STYLES = [
        'success' => 'bg-white border-l-4 border-green-500 text-green-800',
        'error'   => 'bg-white border-l-4 border-red-500 text-red-800',
        'warning' => 'bg-white border-l-4 border-amber-500 text-amber-800',
        'info'    => 'bg-white border-l-4 border-gray-400 text-gray-700',
    ];

    /**
     * Classes CSS calculées pour le type donné.
     * Exposée à la vue Blade via $cls.
     */
    public readonly string $cls;

    /**
     * @param  string  $type  Niveau sémantique : 'success' | 'error' | 'warning' | 'info'
     *                        Toute valeur inconnue est traitée comme 'info'.
     */
    public function __construct(
        public readonly string $type = 'success',
    ) {
        // Résolution défensive : valeur inconnue → style 'info'
        $this->cls = self::STYLES[$type] ?? self::STYLES['info'];
    }

    /**
     * Retourne le chemin de la vue Blade associée à ce composant.
     */
    public function render(): View
    {
        return view('components.alert');
    }
}
