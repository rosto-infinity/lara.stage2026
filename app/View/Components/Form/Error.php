<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;


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
