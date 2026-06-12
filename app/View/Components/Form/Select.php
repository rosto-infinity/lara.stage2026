<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Composant liste déroulante (form/select).
 *
 * Génère un champ <select> avec label, option de placeholder non-sélectionnable,
 * gestion des erreurs de validation et persistance de la sélection via `old()`.
 *
 * ⚠️  Standard sécurité STALL :
 *     L'attribut HTML `required` est INTERDIT en frontend.
 *     La prop $required affiche uniquement l'astérisque visuel (*).
 *
 * Structure du tableau $options :
 *   Clé   → valeur soumise dans le formulaire (ex : ID)
 *   Valeur → libellé affiché dans la liste   (ex : nom)
 *
 * Utilisation Blade :
 * ─────────────────────────────────────────────────────────────
 *   {{-- Options statiques --}}
 *   <x-form.select
 *       name="gender"
 *       label="Genre"
 *       :options="['M' => 'Masculin', 'F' => 'Féminin']"
 *       :required="true"
 *   />
 *
 *   {{-- Options dynamiques depuis la DB --}}
 *   <x-form.select
 *       name="program_id"
 *       label="Programme"
 *       :options="$programs->pluck('name', 'id')->all()"
 *       :selected="$student->program_id"
 *       placeholder="-- Choisir un programme --"
 *   />
 * ─────────────────────────────────────────────────────────────
 *
 * @see resources/views/components/form/select.blade.php
 * @see app/Livewire/Forms/ pour la validation backend associée
 */
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
