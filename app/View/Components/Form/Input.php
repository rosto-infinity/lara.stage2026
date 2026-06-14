<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;


class Input extends Component
{
    /**
     * @param  string  $name         Attribut HTML name/id du champ. Sert aussi à résoudre les erreurs.
     * @param  string|null  $label   Libellé affiché au-dessus du champ. Null → aucun label.
     * @param  string  $type         Type HTML de l'input (text, email, password, number, date…).
     * @param  string  $value        Valeur initiale. Remplacée par old($name) après un échec de validation.
     * @param  bool    $required     Affiche un astérisque rouge (*) sur le label si true.
     *                               N'ajoute PAS l'attribut HTML required (standard STALL sécurité).
     * @param  string  $placeholder  Texte d'invite affiché quand le champ est vide.
     */
    public function __construct(
        public readonly string  $name,
        public readonly ?string $label       = null,
        public readonly string  $type        = 'text',
        public readonly string  $value       = '',
        public readonly bool    $required    = false,
        public readonly string  $placeholder = '',
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.form.input');
    }
}
