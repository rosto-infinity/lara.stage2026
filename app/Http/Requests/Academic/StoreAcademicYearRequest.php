<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAcademicYearRequest extends FormRequest
{
    /**
     * Déterminer si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenir les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'libelle' => [
                'required',
                'string',
                'max:50',
                Rule::unique('academic_years', 'libelle'),
            ],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after:date_debut'],
            'est_active' => ['boolean'],
        ];
    }

    /**
     * Obtenir les messages de validation personnalisés en français.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'libelle.required' => 'Le libellé de l\'année académique est obligatoire.',
            'libelle.string' => 'Le libellé doit être une chaîne de caractères valide.',
            'libelle.max' => 'Le libellé ne doit pas dépasser :max caractères.',
            'libelle.unique' => 'Cette année académique existe déjà.',
            
            'date_debut.required' => 'La date de début est obligatoire.',
            'date_debut.date' => 'La date de début n\'est pas une date valide.',
            
            'date_fin.required' => 'La date de fin est obligatoire.',
            'date_fin.date' => 'La date de fin n\'est pas une date valide.',
            'date_fin.after' => 'La date de fin doit être une date postérieure à la date de début.',
            
            'est_active.boolean' => 'Le champ d\'activation doit être un booléen valide.',
        ];
    }

    /**
     * Obtenir les noms personnalisés pour les attributs de la requête.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'libelle' => 'libellé',
            'date_debut' => 'date de début',
            'date_fin' => 'date de fin',
            'est_active' => 'état actif',
        ];
    }
}
