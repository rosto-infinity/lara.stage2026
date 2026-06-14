<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

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
