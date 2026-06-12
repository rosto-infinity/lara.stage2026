<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant message d'erreur de validation (form/error).
 *
 * Affiche le premier message d'erreur de validation Laravel pour un champ donné.
 * Utilisé automatiquement par les composants form/input, form/select et form/textarea.
 * Peut également être utilisé seul pour des cas spécifiques.
 *
 * Ce composant utilise la directive Blade @error qui vérifie automatiquement
 * le sac d'erreurs de la session (ErrorBag du MessageBag Laravel).
 *
 * Le composant ne rend RIEN si le champ $name n'a aucune erreur.
 *
 * Utilisation Blade (usage interne dans les autres composants form) :
 * ─────────────────────────────────────────────────────────────
 *   <x-form.error :name="$name" />
 * ─────────────────────────────────────────────────────────────
 *
 * Utilisation Blade (usage explicite) :
 * ─────────────────────────────────────────────────────────────
 *   <x-form.error name="email" />
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/form/error.blade.php
 */
class Error extends Component
{
    /**
     * @param  string  $name  Nom du champ de formulaire à vérifier dans le sac d'erreurs.
     *                        Correspond à la clé retournée par la validation Laravel.
     */
    public function __construct(
        public readonly string $name,
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.form.error');
    }
}
