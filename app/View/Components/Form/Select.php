<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;


class Select extends Component
{
    /**
     * @param  string  $name          Attribut HTML name/id. Sert aussi à résoudre les erreurs.
     * @param  string|null  $label    Libellé du champ. Null → aucun label.
     * @param  array<int|string, string>  $options
     *                                Tableau associatif [valeur => libellé] des options.
     * @param  int|string|null  $selected
     *                                Valeur présélectionnée. Remplacée par old($name) si disponible.
     * @param  string  $placeholder   Texte de l'option vide (value="") en tête de liste.
     * @param  bool    $required      Affiche l'astérisque (*) si true. N'ajoute PAS l'attr HTML required.
     */
    public function __construct(
        public readonly string          $name,
        public readonly ?string         $label       = null,
        public readonly array           $options     = [],
        public readonly int|string|null $selected    = null,
        public readonly string          $placeholder = 'Sélectionner…',
        public readonly bool            $required    = false,
    ) {}

    /**
     * Retourne la vue Blade du composant.
     */
    public function render(): View
    {
        return view('components.form.select');
    }
}
