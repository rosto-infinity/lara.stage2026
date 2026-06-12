<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant zone de texte multi-lignes (form/textarea).
 *
 * Génère un champ <textarea> avec label, gestion des erreurs de validation
 * et persistance du contenu via la helper `old()` de Laravel.
 *
 * ⚠️  Standard sécurité STALL :
 *     L'attribut HTML `required` est INTERDIT en frontend.
 *     La prop $required affiche uniquement l'astérisque visuel (*).
 *
 * Utilisation Blade :
 * ─────────────────────────────────────────────────────────────
 *   {{-- Zone de texte simple --}}
 *   <x-form.textarea name="notes" label="Observations" />
 *
 *   {{-- Avec valeur pré-remplie et hauteur personnalisée --}}
 *   <x-form.textarea
 *       name="description"
 *       label="Description du programme"
 *       :value="$program->description"
 *       :rows="6"
 *       :required="true"
 *       placeholder="Décrivez les objectifs pédagogiques…"
 *   />
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/form/textarea.blade.php
 * @see app/Livewire/Forms/ pour la validation backend associée
 */
class Textarea extends Component
{
    /**
     * @param  string       $name         Attribut HTML name/id. Sert aussi à résoudre les erreurs.
     * @param  string|null  $label        Libellé du champ. Null → aucun label.
     * @param  string       $value        Contenu initial. Remplacé par old($name) après un échec de validation.
     * @param  int          $rows         Nombre de lignes visibles du textarea (hauteur CSS via l'attribut HTML rows).
     * @param  bool         $required     Affiche l'astérisque (*) si true. N'ajoute PAS l'attr HTML required.
     * @param  string       $placeholder  Texte d'invite affiché quand le champ est vide.
     */
    public function __construct(
        public readonly string  $name,
        public readonly ?string $label       = null,
        public readonly string  $value       = '',
        public readonly int     $rows        = 4,
        public readonly bool    $required    = false,
        public readonly string  $placeholder = '',
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.form.textarea');
    }
}
